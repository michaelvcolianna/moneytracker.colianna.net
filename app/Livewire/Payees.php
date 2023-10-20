<?php

namespace App\Livewire;

use App\Models\Payee;
use App\Traits\CreatesMonthNames;
use Closure;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Payees extends Component
{
    use CreatesMonthNames;

    /** @var array */
    public $new;

    /** @var boolean */
    public $showingForm = false;

    /**
     * Validation rules for making a new entry.
     */
    protected function rules(): array
    {
        // Array rule with keys specified
        $schedule_months = 'required|array:'.implode(',', range(1, 12));

        return [
            'new.name' => 'required',
            'new.schedule_amount' => 'nullable|integer',
            'new.earliest_day' => 'nullable|integer',
            'new.latest_day' => 'nullable|integer',
            'new.auto_schedule' => 'nullable|boolean',
            'new.schedule_months' => $schedule_months,
            'new.schedule_months.*' => 'nullable|boolean',
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
            'new.name' => 'name',
            'new.schedule_amount' => 'schedule amount',
            'new.earliest_day' => 'earliest day',
            'new.latest_day' => 'latest day',
            'new.auto_schedule' => 'auto schedule option',
            'new.schedule_months' => 'schedule months',
        ], $months);
    }

    /**
     * Events the component listens for.
     */
    protected $listeners = [
        'payeesUpdated' => '$refresh',
        'escapeKeyPressed'
    ];

    /**
     * Create a new component instance.
     */
    public function mount()
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
    public function toggleAllMonths()
    {
        $this->new['schedule_months'] = array_fill_keys(
            range(1, 12),
            array_sum($this->new['schedule_months']) > 0 ? false : true
        );
    }

    /**
     * Clear the fields.
     */
    public function clearFields()
    {
        $this->reset(['new', 'showingForm']);

        $this->new['schedule_months'] = array_fill_keys(range(1, 12), true);
    }

    /**
     * Add a payee.
     */
    public function addPayee()
    {
        $this->validate();

        Payee::create([
            'name' => $this->new['name'],
            'schedule_amount' => $this->new['schedule_amount'] ?? null,
            'earliest_day' => $this->new['earliest_day'] ?? null,
            'latest_day' => $this->new['latest_day'] ?? null,
            'auto_schedule' => $this->new['auto_schedule'] ?? false,
            'schedule_months' => $this->new['schedule_months'],
        ]);

        $this->clearFields();

        $this->dispatch('payeesUpdated');
    }

    /**
     * Handle escape key.
     */
    public function escapeKeyPressed()
    {
        $this->showingForm = false;
    }
}
