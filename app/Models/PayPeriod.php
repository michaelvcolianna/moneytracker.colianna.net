<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayPeriod extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Get the pay period's starting amount.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartAttribute($value)
    {
        return '$' . number_format($value);
    }

    /**
     * Get the pay period's current amount.
     *
     * @param  string  $value
     * @return string
     */
    public function getCurrentAttribute($value)
    {
        if(!$value)
        {
            return $this->start;
        }

        return '$' . number_format($value, 2);
    }
}
