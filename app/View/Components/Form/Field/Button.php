<?php

namespace App\View\Components\Form\Field;

use Illuminate\View\Component;

class Button extends Component
{
    /** @var string */
    public $icon;
    public $id;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param  string  $icon
     * @param  string  $id
     * @param  string  $label
     * @return void
     */
    public function __construct($icon = null, $id, $label = null)
    {
        $this->icon = $icon;
        $this->id = $id;
        $this->label = $label ?? ucfirst($id);
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
