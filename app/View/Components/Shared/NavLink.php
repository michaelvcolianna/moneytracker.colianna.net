<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class NavLink extends Component
{
    /** @var boolean */
    public $current;

    /** @var string */
    public $icon;
    public $label;
    public $route;
    public $test;
    public $url;

    /**
     * Create a new component instance.
     *
     * @param  string  $icon
     * @param  string  $label
     * @param  string  $route
     * @param  string  $test
     * @param  string  $url
     * @return void
     */
    public function __construct($icon, $label, $route = null, $test = null, $url = null)
    {
        $this->current = request()->routeIs($test ?? $route);
        $this->icon = $icon;
        $this->label = $label;
        $this->route = $route;
        $this->test = $test;
        $this->url = $url ?? route($route);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.nav-link');
    }
}
