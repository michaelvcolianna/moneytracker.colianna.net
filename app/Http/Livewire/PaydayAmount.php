<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaydayAmount extends Component
{
    /** @var integer|string */
    public $beginning_amount;

    /**
     * Validation rules for updating the amount.
     *
     * @var array
     */
    protected $rules = [
        'beginning_amount' => 'required|integer',
    ];

    /**
     * Validation attribute names.
     *
     * @var array
     */
    protected $validationAttributes = [
        'beginning_amount' => 'beginning amount',
    ];

    /**
     * Events the component listens for.
     *
     * @var array
     */
    protected $listeners = ['paydayUpdated'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->paydayUpdated();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('entries.payday-amount');
    }

    /**
     * Refresh the current payday.
     *
     * @return void
     */
    public function paydayUpdated()
    {
        session('payday')->refresh();
        $this->beginning_amount = session('payday')->beginning_amount;
    }

    /**
     * Act on an updated value.
     *
     * @param  mixed  $value
     * @return void
     */
    public function updatedBeginningAmount($value)
    {
        $this->validateOnly('beginning_amount');

        session('payday')->beginning_amount = $value;
        session('payday')->recalculate();

        $this->emit('paydayUpdated');
    }
}
