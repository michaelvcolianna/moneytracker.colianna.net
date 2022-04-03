<?php

namespace App\Http\Livewire;

use Livewire\Component as LivewireComponent;

abstract class Component extends LivewireComponent
{
    /** @var string */
    public $fieldId;

    /**
     * Format money with comma.
     *
     * @param  float  $value
     * @return float
     */
    public function moneyFormat($value)
    {
        return number_format($value, 0, null, ',');
    }
}
