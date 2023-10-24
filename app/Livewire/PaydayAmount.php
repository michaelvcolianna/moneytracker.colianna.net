<?php

namespace App\Livewire;

use Closure;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PaydayAmount extends Component
{
    /** @var integer|string */
    #[Rule('required|integer', as: 'beginning amount')]
    public $beginning_amount;

    /**
     * Create a new component instance.
     */
    public function mount()
    {
        $this->paydayUpdated();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payday.amount');
    }

    /**
     * Refresh the current payday.
     */
    #[On('paydayUpdated')]
    public function paydayUpdated()
    {
        session('payday')->refresh();
        session('payday')->recalculate();
        $this->beginning_amount = session('payday')->beginning_amount;
    }

    /**
     * Act on an updated value.
     */
    public function updatedBeginningAmount(mixed $value)
    {
        $this->validateOnly('beginning_amount');

        session('payday')->beginning_amount = $value;
        session('payday')->recalculate();

        $this->dispatch('paydayUpdated');
    }
}
