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
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->clearForm();
        $this->entry->pay_date_id = PayDate::getCurrent()->id;
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
        PayDate::getCurrent()->recalculateCurrent();
        $this->clearForm();
        $this->emit('refreshEntries');
        $this->emit('refreshAmount');
    }

    public function updatedEntryPayee($value)
    {
        if(is_numeric($value) && $payee = Payee::find($value))
        {
            $this->entry->payee_id = $value;
            $this->entry->payee = $payee->name;
        }

        if
        (
            preg_match('/\D+/m', $value)
            &&
            $payee = Payee::firstWhere('name', $value)
        )
        {
            $this->entry->payee_id = $payee->id;
        }

        if(preg_match('/\D+/m', $value) && $this->entry->payee_id)
        {
            $payee = Payee::find($this->entry->payee_id);

            if(!Str::contains($value, $payee->name))
            {
                $this->entry->payee_id = null;
            }
        }

        if(empty($value))
        {
            $this->entry->payee_id = null;
        }
    }
}
