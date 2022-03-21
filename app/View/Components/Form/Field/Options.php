<?php

namespace App\View\Components\Form\Field;

use App\Traits\HasFormInput;
use Illuminate\View\Component;

class Options extends Component
{
    use HasFormInput;

    /** @var array */
    public $options;

    /** @var string */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param  string  $help
     * @param  string  $id
     * @param  string  $label
     * @param  array  $options
     * @param  string  $type
     * @return void
     */
    public function __construct($help = null, $id, $label = null, $options, $type = 'options')
    {
        $this->setDefaultValues($help, $id, $label);
        $this->options = $options;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.field.options');
    }
}
