<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PayDate extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
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
            $current->subDays($current->diffInDays($payPeriod->start) % $payPeriod->date_mod);

            if(!$payDate = PayDate::where('start', $current)->first())
            {
                $end = $current->copy()->addDays(13);

                $payDate = static::create([
                    'pay_period_id' => $payPeriod->id,
                    'start' => $current,
                    'end' => $current->copy()->addDays($payPeriod->date_mod - 1),
                    'beginning' => $payPeriod->amount,
                    'current' => $payPeriod->amount,
                ]);

                // @todo After adding entries, find ones that fit this pay date with
                // auto-schedule settings and create them
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
            $preface . 'start' => 'required|date_format:Y-m-d',
            $preface . 'end' => 'required|date_format:Y-m-d',
            $preface . 'beginning' => 'required|numeric',
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
        $previous = $this->start->copy()->subDays($this->payPeriod->date_mod);

        $checkPeriod = PayPeriod::getNearest($previous);
        if($checkPeriod->start->notEqualTo($this->payPeriod->start))
        {
            $previous = $this->start->copy()->subDays($checkPeriod->date_mod);
        }

        return $previous;
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
}
