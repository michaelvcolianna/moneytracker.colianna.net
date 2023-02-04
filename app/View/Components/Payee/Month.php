<?php

namespace App\View\Components\Payee;

use Illuminate\View\Component;

class Month extends Component
{
    /** @var string */
    public $model;
    public $name;

    /**
     * Create a new component instance.
     *
     * @param  string  $prefix
     * @param  integer  $number
     * @return void
     */
    public function __construct($prefix, $number)
    {
        $this->model = $prefix.'.schedule_months.'.$number;
        $this->name = config('app.months.'.$number);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('payee.month');
    }
}
