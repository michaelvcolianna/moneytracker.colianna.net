<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class NavLink extends Component
{
    /** @var boolean */
    protected $current;

    /** @var string */
    public $icon;
    public $url;

    /**
     * Create a new component instance.
     *
     * @param  string  $icon
     * @param  string  $route
     * @return void
     */
    public function __construct($icon, $route = null)
    {
        $this->current = request()->routeIs($route);
        $this->icon = $icon;
        $this->url = route($route);
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
            // Set the aria-current if needed
            $data['attributes']['aria-current'] = $this->current
                ? 'page'
                : null
                ;

            return 'components.shared.nav-link';
        };
    }
}
