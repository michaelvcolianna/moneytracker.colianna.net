<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Payday extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'beginning_amount',
        'current_amount',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Storage format for date columns.
     */
    protected $dateFormat = 'Y-m-d';

    /**
     * Get the entries under the payday.
     */
    public function entries(): HasMany
    {
        return $this->hasMany(Entry::class);
    }

    /**
     * Get the specified payday or fall back to the current one.
     */
    public static function byDate(string $date = null): Payday
    {
        // Use the supplied date, get from the query, or use today
        $date ??= request()->query('date', date('Y-m-d'));

        try
        {
            $current = new Carbon($date);
        }
        catch(Exception $e)
        {
            // In case Carbon can't parse the supplied date
            $current = new Carbon;
        }

        // Set the day for the nearest payday date
        $start = $current->copy();
        $start->day = $current->day < 15 ? 1 : 15;

        // Get the end day
        $end = $start->copy();
        $end->day = $start->day == 1 ? 14 : $end->endOfMonth()->day;

        if(!$payday = static::where('start_date', $start)->first())
        {
            $payday = static::create([
                'start_date' => $start,
                'end_date' => $end,
                'beginning_amount' => 3000,
                'current_amount' => 3000,
            ]);

            // Values for comparison
            $start_day = $payday->start_date->day;
            $end_day = $payday->end_date->day;

            // Query payees with schedule amounts
            $payees = Payee::whereNotNull('schedule_amount');

            // Build the payees
            $payees->where([
                ['earliest_day', '>=', $start_day],
                ['earliest_day', '<=', $end_day],
            ])->orWhere([
                ['latest_day', '>=', $start_day],
                ['latest_day', '<=', $end_day],
            ]);

            // Loop payees and schedule as needed
            foreach($payees->get() as $payee)
            {
                if($payee->schedulesOnMonth($payday->start_date->month))
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
     * Figure out how much is left after entries.
     */
    public function recalculate(): void
    {
        $subtract = 0;

        foreach($this->entries as $entry)
        {
            $subtract+= $entry->amount;
        }

        $this->current_amount = $this->beginning_amount - $subtract;
        $this->save();
    }

    /**
     * Get a formatted start date.
     */
    public function start(string $format = 'Y-m-d'): string
    {
        return $this->start_date->format($format);
    }

    /**
     * Get the following payday with optional formatting.
     */
    public function newer(string $format = null): Payday|string
    {
        $newer = static::byDate($this->end_date->addDay());

        return $format ? $newer->start_date->format($format) : $newer;
    }

    /**
     * Get the previous payday with optional formatting.
     */
    public function older(string $format = null): Payday|string
    {
        $older = static::byDate($this->start_date->subDay());

        return $format ? $older->start_date->format($format) : $older;
    }

    /**
     * Get the formatted current amount.
     */
    public function prettyCurrentAmount(): string
    {
        return number_format($this->current_amount, 0, null, ',');
    }

    /**
     * Get entries in case-insensitive alphabetical order.
     */
    public function sortedEntries(): Collection
    {
        return $this->entries()
            ->orderBy('payee')->get()
            ->sortBy('payee', SORT_NATURAL|SORT_FLAG_CASE);
    }

    /**
     * Make the class for the current amount's threshold.
     */
    public function threshold(): string|null
    {
        return $this->current_amount < 0
            ? 'negative'
            : ($this->current_amount >= 1000 ? 'positive' : null)
            ;
    }

    /**
     * Make the payday's URL.
     */
    public function url(): string
    {
        return route('entries', ['date' => $this->start()]);
    }
}
