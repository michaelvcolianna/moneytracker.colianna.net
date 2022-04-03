<?php

namespace App\View\Components\Form\Field;

use Illuminate\View\Component;

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
        return view('components.form.field.button');
    }
}
