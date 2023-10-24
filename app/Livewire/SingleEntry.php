<?php

namespace App\Livewire;

use App\Models\Entry;
use Closure;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SingleEntry extends Component
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

    /** @var boolean */
    #[Rule('nullable|boolean', as: 'reconciled option')]
    public $reconciled;

    /** @var \App\Models\Entry */
    public $entry;

    /** @var boolean */
    public $confirmingDelete = false;

    /**
     * Create a new component instance.
     * @return void
     */
    public function mount(Entry $entry)
    {
        $this->entry = $entry;
        $this->updateEntryValues();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('entries.single');
    }

    /**
     * Update the entry's values.
     */
    public function updateEntryValues()
    {
        $this->payee = $this->entry->payee;
        $this->amount = $this->entry->amount;
        $this->scheduled = $this->entry->scheduled;
        $this->reconciled = $this->entry->reconciled;
    }

    /**
     * Act on an updated value.
     */
    public function updated()
    {
        $this->validate();

        $this->entry->update([
            'payee' => $this->payee,
            'amount' => $this->amount,
            'scheduled' => $this->scheduled ?? false,
            'reconciled' => $this->reconciled ?? false,
        ]);

        $this->cleanup();
        $this->updateEntryValues();
    }

    /**
     * Delete an entry.
     */
    public function deleteEntry()
    {
        $this->entry->delete();

        $this->cleanup();
    }

    /**
     * Handle changes to the entry.
     */
    public function cleanup()
    {
        session('payday')->refresh();
        session('payday')->recalculate();

        $this->dispatch('paydayUpdated');
    }

    /**
     * Handle escape key.
     */
    #[On('escapeKeyPressed')]
    public function escapeKeyPressed()
    {
        $this->confirmingDelete = false;
    }
}
