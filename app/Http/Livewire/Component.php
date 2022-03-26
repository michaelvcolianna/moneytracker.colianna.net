<?php

namespace App\Http\Livewire;

use Livewire\Component as LivewireComponent;

abstract class Component extends LivewireComponent
{
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
}
