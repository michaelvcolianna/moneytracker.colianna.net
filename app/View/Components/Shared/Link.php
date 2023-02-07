<?php

namespace App\View\Components\Shared;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Link extends Component
{
    /** @var string */
    protected $href;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param  string  $href
     * @param  string  $label
     * @return void
     */
    public function __construct($href, $label = null)
    {
        $this->href = $href;
        $this->label = $label;
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
