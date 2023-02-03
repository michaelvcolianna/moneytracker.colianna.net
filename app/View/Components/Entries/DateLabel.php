<?php

namespace App\View\Components\Entries;

use Illuminate\View\Component;

class DateLabel extends Component
{
    /** @var string */
    public $date_text;
    public $date_time;

    /**
     * Create a new component instance.
     *
     * @param  \Illuminate\Support\Carbon  $date
     * @return void
     */
    public function __construct($date)
    {
        $this->date_text = $date->format('Y-m-d');
        $this->date_time = $date->format('c');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('entries.date-label');
    }
}
