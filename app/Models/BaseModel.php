<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Don't timestamp.
     */
    public $timestamps = false;

    /**
     * Pass boot overrides up to the Eloquent model.
     */
    public static function boot(): void
    {
        parent::boot();
    }
}
