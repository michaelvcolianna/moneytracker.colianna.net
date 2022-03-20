<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    /** @var boolean */
    public $errors;
    public $login;
    public $status;

    /** @var string */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @return void
     */
    public function __construct($title)
    {
        $this->errors = request()->has('errors');
        $this->login = request()->has('login');
        $this->status = request()->has('status');
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
