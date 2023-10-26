<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entry extends Model
{
    /**
     * The attributes that are mass assignable.
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
     */
    protected $casts = [
        'scheduled' => 'boolean',
        'reconciled' => 'boolean',
    ];

    /**
     * Get the payday the entry is under.
     */
    public function payday(): BelongsTo
    {
        return $this->belongsTo(Payday::class);
    }
}
