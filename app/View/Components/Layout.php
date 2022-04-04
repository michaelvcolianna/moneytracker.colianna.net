<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    /** @var string */
    public $form;
    public $route;
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string  $form
     * @param  string  $title
     * @return void
     */
    public function __construct($form = null, $title)
    {
        $this->form = $form;
        $this->route = request()->route()->getName();
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout');
    }
}
