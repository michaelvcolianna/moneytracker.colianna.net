<?php

namespace App\Livewire;

use App\Models\Payee;
use App\Rules\Months;
use App\Traits\CreatesMonthNames;
use Closure;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SinglePayee extends Component
{
    use CreatesMonthNames;

    /** @var string */
    #[Rule('required')]
    public $name;

    /** @var integer|string */
    #[Rule('nullable|integer')]
    public $schedule_amount;

    /** @var integer|string */
    #[Rule('nullable|integer')]
    public $earliest_day;

    /** @var integer|string */
    #[Rule('nullable|integer')]
    public $latest_day;

    /** @var boolean */
    #[Rule('nullable|boolean')]
    public $auto_schedule;

    /** @var boolean[] */
    #[Rule([
        'schedule_months' => [
            'required',
            new Months,
        ],
        'schedule_months.*' => 'nullable|boolean',
    ])]
    public $schedule_months;

    /** @var \App\Models\Payee */
    public $payee;

    /** @var boolean */
    public $confirmingDelete = false;

    /**
     * Validation attribute names.
     */
    protected function validationAttributes(): array
    {
        // Build explicit attributes for each month
        foreach(range(1, 12) as $number)
        {
            $months['schedule_months.'.$number] = sprintf(
                '%s checkbox',
                $this->month($number)
            );
        }

        return array_merge([
            'name' => 'name',
            'schedule_amount' => 'schedule amount',
            'earliest_day' => 'earliest day',
            'latest_day' => 'latest day',
            'auto_schedule' => 'auto schedule option',
            'schedule_months' => 'schedule months',
        ], $months);
    }

    /**
     * Create a new component instance.
     */
    public function mount(Payee $payee)
    {
        $this->payee = $payee;
        $this->updatePayeeValues();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('payee.single');
    }

    /**
     * Update the payee's values.
     */
    public function updatePayeeValues()
    {
        $this->name = $this->payee->name;
        $this->schedule_amount = $this->payee->schedule_amount;
        $this->earliest_day = $this->payee->earliest_day;
        $this->latest_day = $this->payee->latest_day;
        $this->auto_schedule = $this->payee->auto_schedule;
        $this->schedule_months = $this->payee->schedule_months->toArray();
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
        $this->updatePayeeValues();
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

        $this->payee->update([
            'name' => $this->name,
            'schedule_amount' => $this->schedule_amount ?? null,
            'earliest_day' => $this->earliest_day ?? null,
            'latest_day' => $this->earliest_day ?? null,
            'auto_schedule' => $this->auto_schedule ?? false,
            'schedule_months' => $this->schedule_months,
        ]);

        $this->payee->refresh();
        $this->updatePayeeValues();
    }

    /**
     * Handle escape key.
     */
    #[On('escapeKeyPressed')]
    public function escapeKeyPressed()
    {
        $this->confirmingDelete = false;
    }
}
