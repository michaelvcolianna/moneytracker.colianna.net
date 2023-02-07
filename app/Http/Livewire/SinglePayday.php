<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SinglePayday extends Component
{
    /** @var \App\Models\Payday */
    public $payday;

    /**
     * Validation rules for making a new entry.
     *
     * @var array
     */
    protected $rules = [
        'payday.beginning_amount' => 'required|integer',
    ];

    /**
     * Validation attribute names.
     *
     * @var array
     */
    protected $validationAttributes = [
        'payday.beginning_amount' => 'beginning amount',
    ];

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Payday
     * @return void
     */
    public function mount($payday)
    {
        $this->payday = $payday;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('payday.single');
    }

    /**
     * Act on an updated value.
     *
     * @return void
     */
    public function updated()
    {
        $this->validate();

        $this->payday->save();

        $this->payday->refresh();
        $this->payday->recalculate();
    }
}
