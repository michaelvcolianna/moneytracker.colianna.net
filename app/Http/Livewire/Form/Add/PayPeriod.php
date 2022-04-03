<?php

namespace App\Http\Livewire\Form\Add;

use App\Models\PayPeriod as PayPeriodModel;
use Livewire\Component;

class PayPeriod extends Component
{
    /** @var \App\Models\PayPeriod */
    public $payPeriod;

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return PayPeriodModel::validationRules();
    }

    /**
     * Resets form values and closes the form
     *
     * @return void
     */
    public function clearForm()
    {
        $this->payPeriod = new PayPeriodModel;
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
        return view('livewire.form.add.pay-period');
    }

    /**
     * Saves a new instance.
     *
     * @return void
     */
    public function save()
    {
        $data = $this->validate();
        $this->payPeriod->save();
        $this->clearForm();
        $this->emit('refreshPayPeriods');
    }
}
