<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

abstract class Field extends Component
{
    /** @var boolean */
    public $adding;

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

            if
            (
                isset($data['attributes']['adding'])
                &&
                $data['attributes']['adding']
            )
            {
                if(isset($data['attributes']['wire:model']))
                {
                    $model = $data['attributes']['wire:model'];
                    unset($data['attributes']['wire:model']);
                }

                if(isset($data['attributes']['wire:model.lazy']))
                {
                    $model = $data['attributes']['wire:model.lazy'];
                    unset($data['attributes']['wire:model.lazy']);
                }

                $data['attributes']['wire:model.defer'] = $model;
            }

            if($data['attributes']['type'] == 'number')
            {
                $data['attributes']['inputmode'] = 'numeric';
            }

            return 'components.' . $data['componentName'];
        };
    }
}
