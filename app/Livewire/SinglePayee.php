<?php

namespace App\Livewire;

use App\Models\Payee;
use App\Traits\CreatesMonthNames;
use Closure;
use Illuminate\View\View;
use Livewire\Component;

class SinglePayee extends Component
{
    use CreatesMonthNames;

    /** @var \App\Models\Payee */
    public $payee;

    /** @var boolean */
    public $confirmingDelete = false;

    /**
     * Validation rules for making a new entry.
     */
    protected function rules(): array
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
     */
    protected function validationAttributes(): array
    {
        // Build explicit attributes for each month
        foreach(range(1, 12) as $number)
        {
            $months['payee.schedule_months.'.$number] = sprintf(
                '%s checkbox',
                $this->month($number)
            );
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
     * Events the component listens for.
     */
    protected $listeners = ['escapeKeyPressed'];

    /**
     * Create a new component instance.
     */
    public function mount(Payee $payee)
    {
        $this->payee = $payee;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payee.single');
    }

    /**
     * Toggle months on/off.
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
     */
    public function updated()
    {
        $this->validate();

        foreach(['schedule_amount', 'earliest_day', 'latest_day'] as $name)
        {
            if(empty($this->payee->{$name}) && !is_null($this->payee->{$name}))
            {
                $this->payee->{$name} = null;
            }
        }

        $this->payee->save();

        $this->payee->refresh();
    }

    /**
     * Handle escape key.
     */
    public function escapeKeyPressed()
    {
        $this->confirmingDelete = false;
    }
}
