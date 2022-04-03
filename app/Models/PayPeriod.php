<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayPeriod extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime:Y-m-d',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start',
        'amount',
    ];

    /**
     * Get nearest period by date.
     *
     * @param  \Carbon\Carbon  $date
     * @return \App\Models\PayPeriod
     */
    public static function getNearest($date)
    {
        return static::where('start', '<=', $date)->first();
    }

    /**
     * Provides the validation rules.
     *
     * @param  string  $preface
     * @return array
     */
    public static function validationRules()
    {
        return [
            'payPeriod.start' => 'required|date_format:Y-m-d',
            'payPeriod.amount' => 'required|integer',
        ];
    }

    /**
     * Get the pay dates for this pay period.
     */
    public function payDates()
    {
        return $this->hasMany(PayDate::class);
    }
}
