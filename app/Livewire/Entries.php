<?php

namespace App\Livewire;

use App\Models\Entry;
use Closure;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Illuminate\View\View;
use Livewire\Component;

class Entries extends Component
{
    /** @var string */
    #[Rule('required', as: 'payee')]
    public $payee;

    /** @var integer|string */
    #[Rule('required|integer', as: 'entry amount')]
    public $amount;

    /** @var boolean */
    #[Rule('nullable|boolean', as: 'scheduled option')]
    public $scheduled;

    #[Rule('nullable|boolean', as: 'reconciled option')]
    public $reconciled;

    /** @var boolean */
    public $showingForm = false;

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
        return view('pages.entries');
    }

    /**
     * Refresh the current payday.
     */
    #[On('paydayUpdated')]
    public function paydayUpdated(): void
    {
        session('payday')->refresh();
    }

    /**
     * Clear the fields.
     */
    public function clearFields(): void
    {
        $this->reset();
    }

    /**
     * Add an entry for the payday.
     */
    public function addEntry(): void
    {
        $this->validate();

        Entry::create([
            'payday_id' => session('payday')->id,
            'amount' => $this->amount,
            'payee' => $this->payee,
            'scheduled' => $this->scheduled ?? false,
            'reconciled' => $this->reconciled ?? false,
        ]);

        $this->clearFields();

        session('payday')->recalculate();

        $this->dispatch('paydayUpdated');
    }

    /**
     * Handle escape key.
     */
    #[On('escapeKeyPressed')]
    public function escapeKeyPressed(): void
    {
        $this->showingForm = false;
    }
}
