<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

abstract class Field extends Component
{
    /** @var array */
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return function($data)
        {
            if(!isset($data['attributes']['name']))
            {
                $keys = array_keys($data['attributes']->getAttributes());
                $wire = preg_grep('/wire:model\.?\w*/', $keys);

                $data['attributes']['name'] = $wire
                    ? $data['attributes'][reset($wire)]
                    : $data['attributes']['id']
                    ;
            }

            return 'components.' . $data['componentName'];
        };
    }
}
