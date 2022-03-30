<?php

namespace App\Http\Livewire\Form\Update;

use App\Http\Livewire\Component;
use App\Models\PayPeriod as PayPeriodModel;

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
        return PayPeriodModel::validationRules('payPeriod.');
    }

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\PayPeriod  $payPeriod
     * @return void
     */
    public function mount($payPeriod)
    {
        $this->fieldId = 'pay-period-' . $payPeriod->id;
        $this->payPeriod = $payPeriod;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.update.pay-period');
    }

    /**
     * Update amount.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayPeriodAmount($value)
    {
        $this->validateOnly('payPeriod.amount');

        $this->payPeriod->amount = $this->moneyFormat($value);
        $this->payPeriod->save();
    }

    /**
     * Update biweekly.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayPeriodBiweekly($value)
    {
        $this->validateOnly('payPeriod.biweekly');

        $this->payPeriod->biweekly = $value;
        $this->payPeriod->save();
    }

    /**
     * Update date.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayPeriodStartedAt($value)
    {
        $this->validateOnly('payPeriod.started_at');

        $this->payPeriod->started_at = $value;
        $this->payPeriod->save();
    }
}
