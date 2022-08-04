<?php

namespace App\Http\Livewire\Form\Update;

use App\Http\Livewire\Form\Payee as Component;
use App\Models\Payee as PayeeModel;
use Illuminate\Support\Str;

class Payee extends Component
{
    /** @var string */
    public $fieldId;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Payee  $payee
     * @return void
     */
    public function mount($payee)
    {
        $this->fieldId = 'payee-' . $payee->id . '-';
        $this->options = config('app.months');
        $this->payee = $payee;
        $this->updateSelectButton();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.update.payee');
    }

    /**
     * Update auto.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeAuto($value)
    {
        $this->validateOnly('payee.auto');

        $this->payee->auto = $value;
        $this->payee->save();
    }

    /**
     * Update amount.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeAmount($value)
    {
        $this->validateOnly('payee.amount');

        $this->payee->amount = filled($value) ? $value : null;
        $this->payee->save();
    }

    /**
     * Update April.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeApr($value)
    {
        $this->validateOnly('payee.apr');

        $this->payee->apr = $value;
        $this->payee->save();
    }

    /**
     * Update August.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeAug($value)
    {
        $this->validateOnly('payee.aug');

        $this->payee->aug = $value;
        $this->payee->save();
    }

    /**
     * Update December.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeDec($value)
    {
        $this->validateOnly('payee.dec');

        $this->payee->dec = $value;
        $this->payee->save();
    }

    /**
     * Update end.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeEnd($value)
    {
        $this->validateOnly('payee.end');

        $value = empty($value)
            ? null
            : $value
            ;
        $this->payee->end = $value;
        $this->payee->save();
    }

    /**
     * Update February.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeFeb($value)
    {
        $this->validateOnly('payee.feb');

        $this->payee->feb = $value;
        $this->payee->save();
    }

    /**
     * Update January.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeJan($value)
    {
        $this->validateOnly('payee.jan');

        $this->payee->jan = $value;
        $this->payee->save();
    }

    /**
     * Update July.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeJul($value)
    {
        $this->validateOnly('payee.jul');

        $this->payee->jul = $value;
        $this->payee->save();
    }

    /**
     * Update June.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeJun($value)
    {
        $this->validateOnly('payee.jun');

        $this->payee->jun = $value;
        $this->payee->save();
    }

    /**
     * Update March.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeMar($value)
    {
        $this->validateOnly('payee.mar');

        $this->payee->mar = $value;
        $this->payee->save();
    }

    /**
     * Update May.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeMay($value)
    {
        $this->validateOnly('payee.may');

        $this->payee->may = $value;
        $this->payee->save();
    }

    /**
     * Update name.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeName($value)
    {
        $this->validateOnly('payee.name');

        $this->payee->name = $value;
        $this->payee->save();
    }

    /**
     * Update November.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeNov($value)
    {
        $this->validateOnly('payee.nov');

        $this->payee->nov = $value;
        $this->payee->save();
    }

    /**
     * Update October.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeOct($value)
    {
        $this->validateOnly('payee.oct');

        $this->payee->oct = $value;
        $this->payee->save();
    }

    /**
     * Update September.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeSep($value)
    {
        $this->validateOnly('payee.sep');

        $this->payee->sep = $value;
        $this->payee->save();
    }

    /**
     * Update start.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedPayeeStart($value)
    {
        $this->validateOnly('payee.start');

        $value = empty($value)
            ? null
            : $value
            ;
        $this->payee->start = $value;
        $this->payee->save();
    }
}
