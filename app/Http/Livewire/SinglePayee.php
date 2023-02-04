<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SinglePayee extends Component
{
    /** @var \App\Models\Payee */
    public $payee;

    /** @var boolean */
    public $confirmingDelete;

    /**
     * Validation rules for making a new entry.
     *
     * @var array
     */
    protected function rules()
    {
        // Array rule with keys specified
        $schedule_months = 'required|array:'.implode(',', range(1, 12));

        return [
            'payee.name' => 'required',
            'payee.schedule_amount' => 'nullable|integer',
            'payee.earliest_day' => 'nullable|integer',
            'payee.latest_day' => 'nullable|integer',
            'payee.auto_schedule' => 'nullable|boolean',
            'payee.schedule_months' => $schedule_months,
            'payee.schedule_months.*' => 'nullable|boolean',
        ];
    }

    /**
     * Validation attribute names.
     *
     * @return array
     */
    protected function validationAttributes()
    {
        // Build explicit attributes for each month
        foreach(config('app.months') as $number => $name)
        {
            $months['payee.schedule_months.'.$number] = $name.' checkbox';
        }

        return array_merge([
            'payee.name' => 'name',
            'payee.schedule_amount' => 'schedule amount',
            'payee.earliest_day' => 'earliest day',
            'payee.latest_day' => 'latest day',
            'payee.auto_schedule' => 'auto schedule option',
            'payee.schedule_months' => 'schedule months',
        ], $months);
    }

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Payee  $payee
     * @return void
     */
    public function mount($payee)
    {
        $this->payee = $payee;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('payee.single');
    }

    /**
     * Toggle months on/off.
     *
     * @return void
     */
    public function toggleAllMonths()
    {
        $this->payee->schedule_months = array_fill_keys(
            range(1, 12),
            array_sum($this->payee->schedule_months->toArray()) > 0
                ? false
                : true
        );

        $this->payee->save();
    }

    /**
     * Act on an updated value.
     *
     * @return void
     */
    public function updated()
    {
        $this->validate();

        $this->payee->save();

        $this->payee->refresh();
    }

    /**
     * Delete a payee.
     *
     * @return void
     */
    public function deletePayee()
    {
        $this->payee->delete();

        $this->emit('payeesUpdated');
    }
}
