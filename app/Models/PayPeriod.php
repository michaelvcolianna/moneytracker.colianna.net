<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayPeriod extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'biweekly' => false,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'started_at' => 'datetime',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'started_at',
        'amount',
        'biweekly',
    ];

    /**
     * Get nearest period by date.
     *
     * @param  \Carbon\Carbon  $date
     * @return \App\Models\PayPeriod
     */
    public static function getNearest($date)
    {
        return static::where('started_at', '<=', $date)->first();
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
            $preface . 'started_at' => 'required|date_format:Y-m-d',
            $preface . 'amount' => 'required|numeric',
            $preface . 'biweekly' => 'nullable|boolean',
        ];
    }

    /**
     * Get the modulus check for the date.
     *
     * @return integer
     */
    public function getDateModAttribute()
    {
        return $this->biweekly
            ? 14
            : 7
            ;
    }

    /**
     * Get the pay dates for this pay period.
     */
    public function payDates()
    {
        return $this->hasMany(PayDate::class);
    }
}
