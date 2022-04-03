<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PayDate extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime:Y-m-d',
        'end' => 'datetime:Y-m-d',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pay_period_id',
        'start',
        'end',
        'beginning',
        'current',
    ];

    /**
     * Get the current/specified pay date
     *
     * @return \App\Models\PayDate
     */
    public static function getCurrent()
    {
        $payDate = null;
        $current = new Carbon(request()->query('date', date('Y-m-d')));
        if($payPeriod = PayPeriod::getNearest($current))
        {
            $current->subDays($current->diffInDays($payPeriod->start) % 14);

            if(!$payDate = PayDate::where('start', $current)->first())
            {
                $payDate = static::create([
                    'pay_period_id' => $payPeriod->id,
                    'start' => $current,
                    'end' => $current->copy()->addDays(13),
                    'beginning' => $payPeriod->amount,
                    'current' => $payPeriod->amount,
                ]);

                $startDay = $payDate->start->format('d');
                $endDay = $payDate->end->format('d');
                $startMonth = Str::lower($payDate->start->format('M'));
                $endMonth = Str::lower($payDate->end->format('M'));
                $payees = Payee::whereNotNull('amount');

                if($payDate->start->format('m') != $payDate->end->format('m'))
                {
                    $payees->where(function($query) use($startDay, $endDay) {
                        $query->where('start', '>=', $startDay)
                            ->orWhere('start', '<=', $endDay)
                            ->orWhere('end', '<=', $endDay)
                            ;
                    });
                }
                else
                {
                    $payees->where([
                        ['start', '>=', $startDay],
                        ['start', '<=', $endDay],
                    ])->orWhere([
                        ['end', '>=', $startDay],
                        ['end', '<=', $endDay],
                    ]);
                }

                foreach($payees->get() as $payee)
                {
                    $entry = [
                        'pay_date_id' => $payDate->id,
                        'payee_id' => $payee->id,
                        'amount' => $payee->amount,
                        'payee' => $payee->name,
                        'reconciled' => false,
                    ];

                    if($payee->noMonthsSelected())
                    {
                        $entry['scheduled'] = false;
                    }
                    elseif(!$payee->noMonthsSelected() && ($payee->$startMonth || $payee->endMonth))
                    {
                        $entry['scheduled'] = true;
                    }
                    else
                    {
                        unset($entry);
                    }

                    if(!empty($entry))
                    {
                        Entry::create($entry);
                    }
                }

                $payDate->recalculateCurrent();
            }
        }

        return $payDate;
    }

    /**
     * Provides the validation rules.
     *
     * @param  string  $preface
     * @return array
     */
    public static function validationRules($preface = null)
    {
        return [
            'payDate.start' => 'required|date_format:Y-m-d',
            'payDate.end' => 'required|date_format:Y-m-d',
            'payDate.beginning' => 'required|integer',
        ];
    }

    /**
     * Get following pay date
     *
     * @return \Carbon\Carbon
     */
    public function getNextAttribute()
    {
        return $this->end->copy()->addDay();
    }

    /**
     * Get preceding pay date
     *
     * @return \Carbon\Carbon
     */
    public function getPreviousAttribute()
    {
        $previous = $this->start->copy()->subDays(14);

        $checkPeriod = PayPeriod::getNearest($previous);
        if($checkPeriod->start->notEqualTo($this->payPeriod->start))
        {
            $previous = $this->start->copy()->subDays(14);
        }

        return $previous;
    }

    public function recalculateCurrent()
    {
        $subtract = 0;

        foreach($this->entries as $entry)
        {
            $subtract+= $entry->amount;
        }

        $this->current = $this->beginning - $subtract;
        $this->save();
    }

    /**
     * Get the pay period this pay date belongs to.
     */
    public function payPeriod()
    {
        return $this->belongsTo(PayPeriod::class);
    }

    /**
     * Get the entries for the pay date.
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function getCssClassAttribute()
    {
        if($this->current < 0)
        {
            return '--negative';
        }

        if($this->current > 1000)
        {
            return '--positive';
        }

        return null;
    }

    public function getFormattedCurrentAttribute()
    {
        return number_format($this->current, 0, null, ',');
    }

    public function getFormattedBeginningAttribute()
    {
        return number_format($this->beginning, 0, null, ',');
    }
}
