<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @note Months are set in boot method.
     *
     * @var array
     */
    protected $attributes = [
        'scheduled' => false,
        'reconciled' => false,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pay_date_id',
        'payee_id',
        'amount',
        'payee',
        'scheduled',
        'reconciled',
    ];

    /**
     * Provides the validation rules.
     *
     * @param  string  $preface
     * @return array
     */
    public static function validationRules($preface = null)
    {
        return [
            'entry.pay_date_id' => 'required|exists:App\Models\PayDate,id',
            'entry.payee' => 'nullable|exists:App\Models\Payee,id',
            'entry.amount' => 'required|integer',
            'entry.payee' => 'required|string',
            'entry.scheduled' => 'nullable|boolean',
            'entry.reconciled' => 'nullable|boolean',
        ];
    }

    /**
     * Get the pay date this entry belongs to.
     */
    public function payDate()
    {
        return $this->belongsTo(PayDate::class);
    }

    /**
     * Get the payee this entry belongs to.
     */
    public function payee()
    {
        return $this->belongsTo(Payee::class);
    }
}
