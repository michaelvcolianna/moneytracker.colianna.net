<?php

namespace App\Http\Livewire\Form\Update;

use App\Models\PayDate as PayDateModel;
use Livewire\Component;

class PayDate extends Component
{
    /** @var \App\Models\PayDate */
    public $payDate;

    /** @var string */
    public $fieldId;

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'payDate.beginning' => 'required|numeric',
    ];

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\PayDate  $payDate
     * @return void
     */
    public function mount($payDate)
    {
        $this->fieldId = 'pay-date-' . $payDate->id;
        $this->payDate = $payDate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.update.pay-date');
    }

   /**
     * Update beginning amount.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayDateBeginning($value)
    {
        $this->validateOnly('payDate.beginning');

        $this->payDate->beginning = $value;
        $this->payDate->save();
        $this->payDate->recalculateCurrent();
    }
}
