<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Payee extends Model
{
    /**
     * The attributes that are mass assignable.
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
     */
    protected $casts = [
        'auto_schedule' => 'boolean',
        'schedule_months' => AsArrayObject::class,
    ];

    /**
     * Override the model's boot method.
     */
    public static function boot()
    {
        parent::boot();

        // Set default for schedule months.
        static::creating(function($payee) {
            $payee->schedule_months = array_fill_keys(range(1, 12), true);
        });
    }

    /**
     * Check if the payee schedules on a given month.
     */
    public function schedulesOnMonth(int $month): bool
    {
        return $this->schedule_months[$month];
    }
}
