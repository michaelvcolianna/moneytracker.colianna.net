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
    public $prefix;

    /**
     * Create a new component instance.
     */
    public function __construct(int $number, string $prefix = null)
    {
        $this->model = 'schedule_months.'.$number;
        $this->name = $this->month($number);
        $this->prefix = $prefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payee.month');
    }
}
