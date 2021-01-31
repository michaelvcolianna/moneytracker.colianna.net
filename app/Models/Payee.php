<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payee extends Model
{
    use SoftDeletes;

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
}
