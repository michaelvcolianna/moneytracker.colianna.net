<?php

namespace App\Http\Livewire\Form\Add;

use App\Models\Payee as PayeeModel;
use App\Traits\HasHiddenForm;
use Livewire\Component;

class Payee extends Component
{
    use HasHiddenForm;

    /** @var array */
    public $months;

    /** @var boolean */
    public $active = true;
    public $areAnySelected;

    /** @var float */
    public $amount;

    /** @var integer */
    public $end;
    public $start;

    /** @var string */
    public $name;

    /**
     * Resets form values and closes the form
     *
     * @return void
     */
    public function clearForm()
    {
        $this->reset(['active', 'isFormShowing', 'amount', 'end', 'start', 'name']);
        $this->defaultMonthValues();
        $this->updateSelectButton();
    }

    /**
     * Default for months.
     *
     * @return void
     */
    protected function defaultMonthValues()
    {
        foreach(config('app.months') as $key => $value)
        {
            $this->{$key} = false;
        }
    }

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
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->active = true;
        $this->areAnySelected = true;
        $this->defaultMonthValues();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.add.payee');
    }

    /**
     * Saves a new instance.
     *
     * @return void
     */
    public function save()
    {
        $data = $this->validate();

        PayeeModel::create($data);

        $this->clearForm();

        $this->emit('refreshPayees');
    }

    /**
     * Select/deselect all
     *
     * @return void
     */
    public function selectAll()
    {
        $select = $this->areAnySelected
            ? false
            : true
            ;

        foreach(config('app.months') as $key => $value)
        {
             $this->{$key} = $select;
        }

        $this->updateSelectButton();
    }

    /**
     * Update value.
     *
     * @return void
     */
    public function updated($name, $value)
    {
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

        foreach(config('app.months') as $key => $value)
        {
            $total+= $this->{$key};
        }

        $this->areAnySelected = (bool) $total;
    }
}
