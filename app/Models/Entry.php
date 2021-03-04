<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PayPeriod;
use App\Models\Payee;

class Entry extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pay_period_id',
        'payee_id',
        'name',
        'amount',
        'scheduled',
        'reconciled',
    ];

    /**
     * Get the entry's ring status.
     *
     * @return string
     */
    public function getRingColor()
    {
        if($this->scheduled && !$this->reconciled)
        {
            return 'ring ring-gray-300';
        }

        if($this->scheduled && $this->reconciled)
        {
            return 'ring ring-gray-500';
        }

        if(!$this->scheduled && $this->reconciled)
        {
            return 'ring ring-pink-300';
        }

        return '';
    }

    /**
     * Get the payee's real name.
     *
     * @return string
     */
    public function getRealName()
    {
        return $this->payee
            ? $this->payee->name
            : $this->name;
    }

    /**
     * Get the payee's amount, formatted.
     *
     * @return string
     */
    public function getPrettyAmount()
    {
        return '$' . number_format($this->amount, 2);
    }

    /**
     * Get the pay period that owns the entry.
     */
    public function payPeriod()
    {
        return $this->belongsTo(PayPeriod::class);
    }

    /**
     * Get the payee that owns the entry.
     */
    public function payee()
    {
        return $this->belongsTo(Payee::class);
    }
}
