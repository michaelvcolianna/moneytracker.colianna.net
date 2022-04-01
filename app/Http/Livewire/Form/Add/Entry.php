<?php

namespace App\Http\Livewire\Form\Add;

use App\Models\Entry as EntryModel;
use App\Models\PayDate;
use App\Models\Payee;
use App\Traits\HasHiddenForm;
use Illuminate\Support\Str;
use Livewire\Component;

class Entry extends Component
{
    use HasHiddenForm;

    /** @var boolean */
    public $reconciled;
    public $scheduled;

    /** @var float */
    public $amount;

    /** @var integer */
    public $pay_date_id;
    public $payee_id;

    /** @var string */
    public $payee;

    /**
     * Validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return EntryModel::validationRules();
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->pay_date_id = PayDate::getCurrent()->id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.add.entry');
    }

    public function save()
    {
        $data = $this->validate();
        $data['scheduled'] ??= false;
        $data['reconciled'] ??= false;

        EntryModel::create($data);

        // @todo Recalc

        $this->clearForm();

        $this->emit('refreshEntries');
    }

    public function updatedPayee($value)
    {
        if(is_numeric($value) && $payee = Payee::find($value))
        {
            $this->payee_id = $value;
            $this->payee = $payee->name;
        }

        if(preg_match('/\D+/m', $value) && $payee = Payee::firstWhere('name', $value))
        {
            $this->payee_id = $payee->id;
        }

        if(!empty($value) && $this->payee_id)
        {
            $payee = Payee::find($this->payee_id);

            if(!Str::contains($value, $payee->name))
            {
                $this->payee_id = null;
            }
        }

        if(empty($value))
        {
            $this->payee_id = null;
        }
    }
}
