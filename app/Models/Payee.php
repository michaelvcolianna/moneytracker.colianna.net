<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'schedule_amount',
        'earliest_day',
        'latest_day',
        'auto_schedule',
        'schedule_months',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'auto_schedule' => 'boolean',
        'schedule_months' => AsArrayObject::class,
    ];

    /**
     * Check if the payee schedules on given months.
     *
     * @param  array  $months
     * @return boolean
     */
    public function schedulesMonths($months = [])
    {
        $schedules = false;

        foreach($months as $month)
        {
            if($this->months[$month])
            {
                $schedules = true;
            }
        }

        return $schedules;
    }
}
