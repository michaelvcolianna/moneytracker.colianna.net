<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class Footer extends Component
{
    /** @var string */
    public $copyright;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->copyright = sprintf(
            '%s%s',
            date('Y') !== '2019' ? '2019-' : '',
            date('Y')
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('shared.footer');
    }
}
