<?php

namespace App\Livewire;

use App\Models\Payee;
use App\Rules\Months;
use App\Traits\CreatesMonthNames;
use Closure;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Payees extends Component
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

    /** @var boolean */
    public $showingForm = false;

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
    public function mount(): void
    {
        $this->clearFields();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('pages.payees', [
            'payees' => Payee::orderBy('name')->get(),
        ]);
    }

    /**
     * Toggle months on/off.
     */
    public function toggleAllMonths(): void
    {
        $this->schedule_months = array_fill_keys(
            range(1, 12),
            array_sum($this->schedule_months) > 0 ? false : true
        );
    }

    /**
     * Clear the fields.
     */
    public function clearFields(): void
    {
        $this->reset();

        $this->schedule_months = array_fill_keys(range(1, 12), true);
    }

    /**
     * Add a payee.
     */
    public function addPayee(): void
    {
        $this->validate();

        Payee::create([
            'name' => $this->name,
            'schedule_amount' => filled($this->schedule_amount) ? $this->schedule_amount : null,
            'earliest_day' => filled($this->earliest_day) ? $this->earliest_day : null,
            'latest_day' => filled($this->latest_day) ? $this->latest_day : null,
            'auto_schedule' => $this->auto_schedule ?? false,
            'schedule_months' => $this->schedule_months,
        ]);

        $this->clearFields();

        $this->dispatch('payeesUpdated');
    }

    /**
     * Refresh the component.
     */
    #[On('payeesUpdated')]
    public function payeesUpdated(): void
    {
        $this->clearFields();
    }

    /**
     * Handle escape key.
     */
    #[On('escapeKeyPressed')]
    public function escapeKeyPressed(): void
    {
        $this->showingForm = false;
    }
}
