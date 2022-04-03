<?php

namespace App\View\Components\Form\Field;

use App\View\Component;

class Button extends Component
{
    /** @var string */
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param  string  $icon
     * @return void
     */
    public function __construct($icon = null)
    {
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return function($data)
        {
            // Add an icon if specified
            if($this->icon)
            {
                $data['attributes']['class'] = $this->addIcon(
                    $data['attributes']['class'],
                    $this->icon
                );
            }

            return 'components.form.field.button';
        };

    }
}
