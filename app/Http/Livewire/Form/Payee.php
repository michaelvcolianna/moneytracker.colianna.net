<?php

namespace App\Http\Livewire\Form;

use App\Models\Payee as PayeeModel;
use Livewire\Component;

abstract class Payee extends Component
{
    /** @var \App\Models\PayPeriod */
    public $payee;

    /** @var array */
    public $options;

    /** @var boolean */
    public $areAnySelected;

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return PayeeModel::validationRules();
    }

    /**
     * Selects/deselects all
     *
     * @return void
     */
    public function selectAll()
    {
        $select = $this->areAnySelected
            ? false
            : true
            ;

        foreach($this->options as $key => $value)
        {
            $this->payee->{$key} = $select;
        }

        if($this->payee->wasRecentlyCreated)
        {
            $this->payee->save();
        }

        $this->updateSelectButton();
    }

    /**
     * Switch between select/deselect all.
     *
     * @return void
     */
    protected function updateSelectButton()
    {
        $total = 0;

        foreach($this->options as $key => $value)
        {
            $total+= $this->payee->{$key};
        }

        $this->areAnySelected = (bool) $total;
    }
}
