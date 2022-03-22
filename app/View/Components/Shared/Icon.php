<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class Icon extends Component
{
    /** @var mixed<integer|string> */
    public $height;
    public $width;

    /** @var string */
    public $fill;
    public $name;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $fill
     * @param  integer|string  $height
     * @param  integer|string  $width
     * @return void
     */
    public function __construct($name, $fill = 'currentColor', $height = 18, $width = 18)
    {
        $this->fill = $fill;
        $this->height = $height;
        $this->width = $width;
        $this->name = 'partials.svg.' . $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.icon');
    }
}
