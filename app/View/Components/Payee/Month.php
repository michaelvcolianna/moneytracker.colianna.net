<?php

namespace App\View\Components\Payee;

use App\Traits\CreatesMonthNames;
use Closure;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Month extends Component
{
    use CreatesMonthNames;

    /** @var string */
    public $model;
    public $name;

    /**
     * Create a new component instance.
     */
    public function __construct(string $prefix, int $number)
    {
        $this->model = $prefix.'.schedule_months.'.$number;
        $this->name = $this->month($number);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payee.month');
    }
}
