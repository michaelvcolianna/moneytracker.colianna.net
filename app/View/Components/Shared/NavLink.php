<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    /** @var string */
    protected $current;
    public $label;
    protected $route;

    /**
     * Create a new component instance.
     */
    public function __construct(string $route, string $label = null)
    {
        $this->current = request()->routeIs($route) ? 'page' : null;
        $this->label = $label;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
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
