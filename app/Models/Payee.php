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
     * Get the payee's amount, formatted.
     *
     * @return string
     */
    public function getPrettyAmount()
    {
        return '$' . number_format($this->amount, 2);
    }
}
