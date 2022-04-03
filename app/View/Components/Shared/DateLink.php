<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class DateLink extends Component
{
    /** @var \Carbon\Carbon */
    protected $date;

    /** @var string */
    public $aria;
    public $arrow;
    public $rel;

    /**
     * Create a new component instance.
     *
     * @param  string  $aria
     * @param  string  $arrow
     * @param  \Carbon\Carbon  $date
     * @param  string  $rel
     * @return void
     */
    public function __construct($aria, $arrow, $date, $rel)
    {
        $this->aria = $aria;
        $this->arrow = $arrow;
        $this->date = $date;
        $this->rel = $rel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.date-link');
    }

    /**
     * Format the date for time tag.
     *
     * @return string
     */
    public function time()
    {
        return $this->date->format('Y-m-d');
    }

    /**
     * Create a URL for the date.
     *
     * @return string
     */
    public function href()
    {
        return route('dashboard', [
            'date' => $this->date->format('Y-m-d'),
        ]);
    }

    /**
     * Format the date for an aria label.
     *
     * @return string
     */
    public function label()
    {
        return $this->date->format('F j Y');
    }

    /**
     * Format the date for a datetime property.
     *
     * @return string
     */
    public function rfc()
    {
        return $this->date->format('c');
    }
}
