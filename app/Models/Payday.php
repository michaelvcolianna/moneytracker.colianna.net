<?php

namespace App\Models;

use App\Models\Payee;
use App\Models\Entry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payday extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'beginning_amount',
        'current_amount',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * Get the entries under the payday.
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    /**
     * Get the specified payday or fall back to the current one.
     *
     * @param  string  $date
     * @return \App\Models\Payday
     */
    public static function byDate($date = null)
    {
        // Values for making a new payday
        $start = new Carbon(config('app.start'));
        $amount = config('app.amount');
        $frequency = config('app.frequency');

        // Use the supplied date, or get from the query, or use today
        $date ??= request()->query('date', date('Y-m-d'));

        try
        {
            $current = new Carbon($date);
        }
        catch(\Exception $e)
        {
            // In case Carbon can't parse the supplied date
            // @todo Log $date
            $current = new Carbon;
        }

        // Make the nearest payday date
        $current->subDays($current->diffInDays($start) % $frequency);

        if(!$payday = static::where('start_date', $current->timestamp)->first())
        {
            $payday = static::create([
                'start_date' => $current,
                'end_date' => $current->copy()->addDays(13),
                'beginning_amount' => $amount,
                'current_amount' => $amount,
            ]);

            // Values for comparison
            $start_day = $payday->start_date->format('d');
            $end_day = $payday->end_date->format('d');
            $months = [
                'start' => $payday->start_date->format('n'),
                'end' => $payday->end_date->format('n'),
            ];

            // Query payees with schedule amounts
            $payees = Payee::whereNotNull('schedule_amount');

            if($months['start'] !== $months['end'])
            {
                // Build the payees across months
                $payees->where(function($query) use($start_day, $end_day) {
                    $query->where('earliest_day', '>=', $start_day)
                          ->orWhere('earliest_day', '<=', $end_day)
                          ->orWhere('latest_day', '<=', $end_day)
                    ;
                });
            }
            else
            {
                // Build the payees in single month
                $payees->where([
                    ['earliest_day', '>=', $start_day],
                    ['earliest_day', '<=', $end_day],
                ])->orWhere([
                    ['latest_day', '>=', $start_day],
                    ['latest_day', '<=', $end_day],
                ]);
            }

            // Loop payees and schedule as needed
            foreach($payees->get() as $payee)
            {
                if($payee->schedulesMonths($months))
                {
                    Entry::create([
                        'payday_id' => $payday->id,
                        'amount' => $payee->schedule_amount,
                        'payee' => $payee->name,
                        'scheduled' => $payee->auto_schedule,
                        'reconciled' => false,
                    ]);
                }
            }

            // Account for any scheduled amounts
            $payday->recalculate();
        }

        return $payday;
    }

    /**
     * Figure out how much is left from the beginning amount after entries.
     *
     * @return void
     */
    public function recalculate()
    {
        $subtract = 0;

        foreach($this->entries as $entry)
        {
            $subtract+= $entry->amount;
        }

        $this->current_amount = $this->beginning_amount - $subtract;
        $this->save();
    }
}
