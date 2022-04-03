<?php

namespace App\Http\Livewire\Form\Add;

use App\Http\Livewire\Form\Payee as Component;
use App\Models\Payee as PayeeModel;

class Payee extends Component
{
    /**
     * Resets form values and closes the form
     *
     * @return void
     */
    public function clearForm()
    {
        $this->payee = new PayeeModel;
        $this->updateSelectButton();
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->areAnySelected = true;
        $this->options = config('app.months');
        $this->clearForm();
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
        $this->payee->save();
        $this->clearForm();
        $this->emit('refreshPayees');
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
}
