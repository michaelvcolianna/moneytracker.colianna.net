<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class NavLink extends Component
{
    /** @var string */
    protected $current;
    public $label;
    protected $route;

    /**
     * Create a new component instance.
     *
     * @param  string  $route
     * @param  string  $label
     * @return void
     */
    public function __construct($route, $label = null)
    {
        $this->current = request()->routeIs($route) ? 'page' : null;
        $this->label = $label;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return function($data)
        {
            // Set the href
            $data['attributes']['href'] = route($this->route);

            // Set aria-current as needed
            $data['attributes']['aria-current'] = $this->current;

            return 'shared.link';
        };
    }
}
