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
}
