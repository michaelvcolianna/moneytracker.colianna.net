<?php

namespace App\Livewire;

use App\Models\Entry;
use Closure;
use Illuminate\View\View;
use Livewire\Component;

class Entries extends Component
{
    /** @var array */
    public $new = [
        'payee',
        'amount',
        'scheduled',
        'reconciled',
    ];

    /** @var boolean */
    public $showingForm = false;

    /**
     * Validation rules for making a new entry.
     */
    protected $rules = [
        'new.payee' => 'required',
        'new.amount' => 'required|integer',
        'new.scheduled' => 'nullable|boolean',
        'new.reconciled' => 'nullable|boolean',
    ];

    /**
     * Validation attribute names.
     */
    protected $validationAttributes = [
        'new.payee' => 'payee',
        'new.amount' => 'entry amount',
        'new.scheduled' => 'scheduled option',
        'new.reconciled' => 'reconciled option',
    ];

    /**
     * Events the component listens for.
     */
    protected $listeners = [
        'paydayUpdated',
        'escapeKeyPressed'
    ];

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
        return view('pages.entries');
    }

    /**
     * Refresh the current payday.
     */
    public function paydayUpdated()
    {
        session('payday')->refresh();
    }

    /**
     * Clear the fields.
     */
    public function clearFields()
    {
        $this->reset(['new', 'showingForm']);
    }

    /**
     * Add an entry for the payday.
     */
    public function addEntry()
    {
        $this->validate();

        Entry::create([
            'payday_id' => session('payday')->id,
            'amount' => $this->new['amount'],
            'payee' => $this->new['payee'],
            'scheduled' => $this->new['scheduled'] ?? false,
            'reconciled' => $this->new['reconciled'] ?? false,
        ]);

        $this->clearFields();

        session('payday')->recalculate();

        $this->dispatch('paydayUpdated');
    }

    /**
     * Handle escape key.
     */
    public function escapeKeyPressed()
    {
        $this->showingForm = false;
    }
}
