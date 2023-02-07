<?php

namespace App\Http\Livewire;

use App\Models\Payee;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Payees extends Component
{
    /** @var array */
    public $new;

    /** @var boolean */
    public $showingForm = false;

    /**
     * Validation rules for making a new entry.
     *
     * @return array
     */
    protected function rules()
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
     *
     * @return array
     */
    protected function validationAttributes()
    {
        // Build explicit attributes for each month
        foreach(config('app.months') as $number => $name)
        {
            $months['new.schedule_months.'.$number] = $name.' checkbox';
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
     *
     * @var array
     */
    protected $listeners = ['payeesUpdated' => '$refresh'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->clearFields();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('pages.payees', [
            'payees' => Payee::orderBy('name')->get(),
        ]);
    }

    /**
     * Toggle months on/off.
     *
     * @return void
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
     *
     * @return void
     */
    public function clearFields()
    {
        $this->reset(['new', 'showingForm']);

        $this->new['schedule_months'] = array_fill_keys(range(1, 12), true);
    }

    /**
     * Add a payee.
     *
     * @return void
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

        $this->emit('payeesUpdated');
    }
}
