<?php

namespace App\View\Components\Entries;

use Illuminate\View\Component;

class Link extends Component
{
    /** @var \Illuminate\Support\Carbon */
    protected $date;

    /** @var string */
    public $label;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Support\Carbon  $date
     * @param  string  $label
     * @return void
     */
    public function __construct($date, $label = null)
    {
        $this->date = $date;
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
            $data['attributes']['href'] = route('entries', [
                'date' => $this->date->format('Y-m-d'),
            ]);

            return 'shared.link';
        };
    }
}
