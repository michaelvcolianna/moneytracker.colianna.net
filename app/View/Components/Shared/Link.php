<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Link extends Component
{
    /** @var string */
    protected $href;
    public $label;

    /**
     * Create a new component instance.
     */
    public function __construct(string $href, string $label = null)
    {
        $this->href = $href;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return function($data)
        {
            // Set the href
            $data['attributes']['href'] = $this->href;

            // Set external label if needed
            if(!Str::startsWith($this->href, config('app.url')))
            {
                $data['attributes']['aria-describedby'] = 'label-external';
            }

            return 'shared.link';
        };
    }
}
