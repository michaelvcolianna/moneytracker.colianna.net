<?php

namespace App\View\Components\Form\Field;

use App\Traits\HasFormInput;
use Illuminate\View\Component;

class Boolean extends Component
{
    use HasFormInput;

    /**
     * Create a new component instance.
     *
     * @param  string  $help
     * @param  string  $id
     * @param  string  $label
     * @param  string  $test
     * @return void
     */
    public function __construct($help = null, $id, $label = null, $test = null)
    {
        $this->setDefaultValues($help, $id, $label, $test);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.field.boolean');
    }
}
