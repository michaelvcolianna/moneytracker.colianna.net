<?php

namespace App\Http\Livewire\Form\Add;

use App\Http\Livewire\Component;
use App\Models\PayPeriod as PayPeriodModel;
use App\Traits\HasHiddenForm;

class PayPeriod extends Component
{
    use HasHiddenForm;

    /** @var boolean */
    public $biweekly;

    /** @var float */
    public $amount;

    /** @var string */
    public $started_at;

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
     * @return \Illuminate\Http\Response
     */
    public function save()
    {
        $this->validate();

        PayPeriodModel::create([
            'started_at' => $this->started_at,
            'amount' => $this->amount,
            'biweekly' => $this->biweekly ?? false,
        ]);

        $this->emit('refreshPayPeriods');

        $this->reset();
    }
}
