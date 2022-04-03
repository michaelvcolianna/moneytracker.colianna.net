<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    /** @var string */
    public $route;
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @return void
     */
    public function __construct($title)
    {
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
