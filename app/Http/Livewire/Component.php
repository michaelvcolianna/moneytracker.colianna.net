<?php

namespace App\Http\Livewire;

use Livewire\Component as LivewireComponent;

abstract class Component extends LivewireComponent
{
    /** @var string */
    public $fieldId;

    /**
     * Makes sure money is formatted properly.
     *
     * @param  float  $value
     * @return float
     */
    protected function moneyFormat($value)
    {
        return number_format($value, 2, '.', '');
    }

    /**
     * Format money with comma.
     *
     * @param  float  $value
     * @return float
     */
    public function moneyFormatComma($value)
    {
        return number_format($value, 2, '.', ',');
    }
}
