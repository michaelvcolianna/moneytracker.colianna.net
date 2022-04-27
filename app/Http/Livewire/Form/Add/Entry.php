<?php

namespace App\Http\Livewire\Form\Add;

use App\Models\Entry as EntryModel;
use App\Models\PayDate;
use App\Models\Payee;
use Illuminate\Support\Str;
use Livewire\Component;

class Entry extends Component
{
    /** @var \App\Models\Entry */
    public $entry;

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
     * Resets form values and closes the form
     *
     * @return void
     */
    public function clearForm()
    {
        $this->entry = new EntryModel;
        $this->entry->pay_date_id = PayDate::getCurrent()->id;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->clearForm();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.add.entry');
    }

    public function save()
    {
        $this->validate();
        $this->entry->save();
        $this->entry->payDate->recalculateCurrent();
        $this->clearForm();
        $this->emit('refreshEntries');
        $this->emit('refreshAmount');
    }
}
