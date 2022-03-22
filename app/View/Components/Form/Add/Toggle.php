<?php

namespace App\View\Components\Form\Add;

use Illuminate\View\Component;

class Toggle extends Component
{
    /** @var string */
    public $label;

    /**
     * Create a new component instance.
     *
     * @param  string  $label
     * @return void
     */
    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.add.toggle');
    }
}
