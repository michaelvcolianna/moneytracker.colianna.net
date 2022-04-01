<?php

namespace App\Http\Livewire\Form\Update;

use App\Http\Livewire\Component;
use App\Models\PayDate;
use App\Traits\HasHiddenForm;

class Amount extends Component
{
    use HasHiddenForm;

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
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->payDate = PayDate::getCurrent();
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

        $this->paydate()->recalculateCurrent();

        $this->emit('refreshAmount');

        $this->isFormShowing = false;
    }
}
