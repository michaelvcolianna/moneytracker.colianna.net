<?php

namespace App\Http\Livewire\Form\Update;

use App\Models\PayDate;
use Livewire\Component;

class Amount extends Component
{
    /** @var \App\Models\PayDate */
    public $payDate;

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'payDate.beginning' => 'required|numeric',
    ];

    protected $listeners = [
        'refreshAmount' => '$refresh',
    ];

    /**
     * Resets form values and closes the form
     *
     * @return void
     */
    public function clearForm()
    {
        $this->payDate = PayDate::getCurrent();
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
        return view('livewire.form.update.amount');
    }

    /**
     * Update the pay date.
     *
     * @return void
     */
    public function update()
    {
        $data = $this->validate();
        $this->payDate->save();
        $this->payDate->recalculateCurrent();
        $this->emit('refreshAmount');
    }
}
