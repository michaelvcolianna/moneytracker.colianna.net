<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class Entries extends Component
{
    /** @var array */
    public $new;

    /** @var boolean */
    public $showingForm;

    /**
     * Validation rules for making a new entry.
     *
     * @var array
     */
    protected $rules = [
        'new.payee' => 'required',
        'new.amount' => 'required|integer',
        'new.scheduled' => 'nullable|boolean',
        'new.reconciled' => 'nullable|boolean',
    ];

    /**
     * Validation attribute names.
     *
     * @var array
     */
    protected $validationAttributes = [
        'new.payee' => 'payee',
        'new.amount' => 'entry amount',
        'new.scheduled' => 'scheduled option',
        'new.reconciled' => 'reconciled option',
    ];

    /**
     * Events the component listens for.
     *
     * @var array
     */
    protected $listeners = ['paydayUpdated'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->paydayUpdated();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('pages.entries');
    }

    /**
     * Refresh the current payday.
     *
     * @return void
     */
    public function paydayUpdated()
    {
        session('payday')->refresh();
    }

    /**
     * Clear the fields.
     *
     * @return void
     */
    public function clearFields()
    {
        $this->reset(['new', 'showingForm']);
    }

    /**
     * Add an entry for the payday.
     *
     * @return void
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

        $this->emit('paydayUpdated');
    }
}
