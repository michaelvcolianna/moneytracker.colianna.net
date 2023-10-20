<?php

namespace App\Livewire;

use App\Models\Payday;
use Closure;
use Illuminate\View\View;
use Livewire\Component;

class SinglePayday extends Component
{
    /** @var \App\Models\Payday */
    public $payday;

    /**
     * Validation rules for making a new entry.
     */
    protected $rules = [
        'payday.beginning_amount' => 'required|integer',
    ];

    /**
     * Validation attribute names.
     */
    protected $validationAttributes = [
        'payday.beginning_amount' => 'beginning amount',
    ];

    /**
     * Create a new component instance.
     */
    public function mount(Payday $payday)
    {
        $this->payday = $payday;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payday.single');
    }

    /**
     * Act on an updated value.
     */
    public function updated()
    {
        $this->validate();

        $this->payday->save();

        $this->payday->refresh();
        $this->payday->recalculate();
    }
}
