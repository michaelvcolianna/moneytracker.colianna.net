<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Entry;

class PayPeriod extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'start',
        'current',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Get the pay period's current amount.
     *
     * @param  string  $value
     * @return string
     */
    public function getCurrentAttribute($value)
    {
        return $value ?? $this->start;
    }

    /**
     * Get the pay period's starting amount, formatted.
     *
     * @return string
     */
    public function getPrettyStart()
    {
        return '$' . number_format($this->start, 2);
    }

    /**
     * Get the pay period's current amount, formatted.
     *
     * @return string
     */
    public function getPrettyCurrent()
    {
        return '$' . number_format($this->current, 2);
    }

    /**
     * Get the pay period's amount status.
     *
     * @return string
     */
    public function getAmountStatus()
    {
        switch(true)
        {
            case ($this->current >= 1000):
                $status = 'text-green-600';
                break;
            case ($this->current < 0):
                $status = 'text-red-600';
                break;
            default:
                $status = null;
                break;
        }

        return $status;
    }

    /**
     * Get the entries for the pay period.
     */
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
