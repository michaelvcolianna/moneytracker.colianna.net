<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payday_id',
        'amount',
        'payee',
        'scheduled',
        'reconciled',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'scheduled' => 'boolean',
        'reconciled' => 'boolean',
    ];

    /**
     * Get the payday the entry is under.
     */
    public function payday()
    {
        return $this->belongsTo(Payday::class);
    }
}
