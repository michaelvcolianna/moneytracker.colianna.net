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
    public function mount(): void
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
    public function paydayUpdated(): void
    {
        auth()->user()->payday()->refresh();
        auth()->user()->payday()->recalculate();
        $this->beginning_amount = auth()->user()->payday()->beginning_amount;
    }

    /**
     * Act on an updated value.
     */
    public function updatedBeginningAmount(mixed $value): void
    {
        $this->validateOnly('beginning_amount');

        auth()->user()->payday()->update([
            'beginning_amount' => $value,
        ]);

        $this->dispatch('paydayUpdated');
    }
}
