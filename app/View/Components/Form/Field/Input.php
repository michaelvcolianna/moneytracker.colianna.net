<?php

namespace App\View\Components\Form\Field;

use App\Traits\HasFormInput;
use Illuminate\View\Component;

class Input extends Component
{
    use HasFormInput;

    /**
     * Create a new component instance.
     *
     * @param  string  $help
     * @param  string  $id
     * @param  string  $label
     * @return void
     */
    public function __construct($help = null, $id, $label = null)
    {
        $this->setDefaultValues($help, $id, $label);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.field.input');
    }
}
