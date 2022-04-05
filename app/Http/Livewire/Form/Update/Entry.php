<?php

namespace App\Http\Livewire\Form\Update;

use App\Models\Entry as EntryModel;
use App\Models\PayDate;
use App\Models\Payee;
use Illuminate\Support\Str;
use Livewire\Component;

class Entry extends Component
{
    /** @var \App\Models\Entry */
    public $entry;

    /** @var boolean */
    public $isConfirmShowing;

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return EntryModel::validationRules();
    }

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Entry  $entry
     * @return void
     */
    public function mount($entry)
    {
        $this->entry = $entry;
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

   /**
     * Update amount.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedEntryAmount($value)
    {
        $this->validateOnly('entry.amount');

        $this->entry->amount = $value;
        $this->entry->save();

        PayDate::getCurrent()->recalculateCurrent();

        $this->emit('refreshAmount');
    }

    /**
     * Update scheduled.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedEntryScheduled($value)
    {
        $this->validateOnly('entry.scheduled');

        $this->entry->scheduled = $value;
        $this->entry->save();
    }

    /**
     * Update reconciled.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedEntryReconciled($value)
    {
        $this->validateOnly('entry.reconciled');

        $this->entry->reconciled = $value;
        $this->entry->save();
    }

    public function updatedEntryPayee($value)
    {
        $this->validateOnly('entry.payee');

        $this->entry->payee = $value;
        $this->entry->save();
    }

    public function delete()
    {
        $this->entry->delete();

        PayDate::getCurrent()->recalculateCurrent();

        $this->emit('refreshEntries');
        $this->emit('refreshAmount');
    }
}
