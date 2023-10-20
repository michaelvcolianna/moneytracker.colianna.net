<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
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
     */
    public function render(): View|Closure|string
    {
        return view('shared.footer');
    }
}
