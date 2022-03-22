<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class NavLink extends Component
{
    /** @var string */
    public $icon;
    public $label;
    public $route;
    public $test;
    public $url;

    /**
     * Create a new component instance.
     *
     * @param  string  $current
     * @param  string  $icon
     * @param  string  $label
     * @param  string  $route
     * @param  string  $test
     * @param  string  $url
     * @return void
     */
    public function __construct($current = 'page', $icon, $label, $route = null, $test = null, $url = null)
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->route = $route;
        $this->test = $test;
        $this->url = $url;

        if(request()->routeIs($test ?? $route))
        {
            $this->properties['aria-current'] = $current;
        }
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
