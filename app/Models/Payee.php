<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payee extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'amount',
        'schedule',
    ];

    /**
     * Get the payee's amount.
     *
     * @param  string  $value
     * @return string
     */
    public function getAmountAttribute($value)
    {
        return $value
            ? '$' . number_format($value)
            : false;
    }

    /**
     * Get the payee's raw amount.
     *
     * @return string
     */
    public function getRawAmount()
    {
        return $this->attributes['amount'];
    }
}
