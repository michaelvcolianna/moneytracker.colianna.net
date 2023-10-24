<?php

namespace App\Livewire;

use App\Models\Payday;
use Closure;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SinglePayday extends Component
{
    /** @var integer|string */
    #[Rule('required|integer', as: 'beginning amount')]
    public $beginning_amount;

    /** @var \App\Models\Payday */
    public $payday;

    /**
     * Create a new component instance.
     */
    public function mount(Payday $payday): void
    {
        $this->payday = $payday;
        $this->updateBeginningAmount();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payday.single');
    }

    /**
     * Update the beginning amount.
     */
    public function updateBeginningAmount(): void
    {
        $this->beginning_amount = $this->payday->beginning_amount;
    }

    /**
     * Act on an updated value.
     */
    public function updated(): void
    {
        $this->validate();

        $this->payday->update([
            'beginning_amount' => $this->beginning_amount,
        ]);

        $this->payday->refresh();
        $this->payday->recalculate();

        $this->updateBeginningAmount();
    }
}
