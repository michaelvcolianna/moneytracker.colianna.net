<?php

namespace App\Http\Livewire\Form\Update;

use Livewire\Component;

class Entry extends Component
{
    /** @var string */
    public $amount;
    public $num;
    public $payee;

    /**
     * Create a new component instance.
     *
     * @param  string  $amount
     * @param  string  $num
     * @param  string  $payee
     * @return void
     */
    public function mount($amount, $num, $payee)
    {
        $this->amount = $amount;
        $this->num = $num;
        $this->payee = $payee;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.update.entry');
    }
}
