<?php

namespace App\View\Components\Entries;

use App\Models\Payday;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DateLabel extends Component
{
    /** @var string */
    public $date_text;
    public $date_time;

    /**
     * Create a new component instance.
     */
    public function __construct(Payday $payday)
    {
        $this->date_text = $payday->start_date->format('Y-m-d');
        $this->date_time = $payday->start_date->format('c');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('entries.date-label');
    }
}
