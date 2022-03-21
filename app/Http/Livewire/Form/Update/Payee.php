<?php

namespace App\Http\Livewire\Form\Update;

use Livewire\Component;

class Payee extends Component
{
    /** @var string */
    public $amount;
    public $end;
    public $name;
    public $num;
    public $start;

    /**
     * Create a new component instance.
     *
     * @param  string  $amount
     * @param  string  $end
     * @param  string  $name
     * @param  string  $num
     * @param  string  $end
     * @return void
     */
    public function mount($amount = null, $end = null, $name, $num, $start = null)
    {
        $this->amount = $amount;
        $this->end = $end;
        $this->name = $name;
        $this->num = $num;
        $this->start = $start;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.update.payee');
    }
}
