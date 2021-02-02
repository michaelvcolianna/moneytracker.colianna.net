<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\PayPeriod;
use App\Models\Payee;
use App\Models\Entry;

class Listing extends Component
{
    public $edit_id;
    public $payee_id;
    public $name;
    public $amount;
    public $scheduled;
    public $reconciled;

    protected $rules = [
        'payee_id' => 'nullable|required_without:name|exists:App\Models\Payee,id',
        'name' => 'nullable|required_without:payee_id|string',
        'amount' => 'required|numeric',
        'scheduled' => 'nullable|boolean',
        'reconciled' => 'nullable|boolean',
    ];

    protected $listeners = [
        'entry:add' => '$refresh',
    ];

    public function render()
    {
        if(request()->has('date'))
        {
            $date = \DateTime::createFromFormat('Y-m-d', request()->date);
        }
        else
        {
            $date = new \DateTime;

            if($date->format('w') != 5)
            {
                $date->modify('last friday');
            }

            $limit = 0;
            while(PayPeriod::where('date', $date->format('Y-m-d'))->count() == 0)
            {
                $date->modify('-1 week');

                // Don't look back further than 8 weeks
                if($limit > 4)
                {
                    abort(404);
                }

                $limit++;
            }
        }

        $current = PayPeriod::where('date', $date->format('Y-m-d'))->first();
        $payees = Payee::orderBy('name')->get();

        return view('dashboard.listing', [
            'current' => $current,
            'payees' => $payees,
        ]);
    }

    public function openEntry($id)
    {
        $entry = Entry::where('id', $id)->first();
        $this->edit_id = $entry->id;
        $this->payee_id = $entry->payee ? $entry->payee->id : null;
        $this->name = $entry->name ?? null;
        $this->amount = $entry->amount;
        $this->scheduled = $entry->scheduled ?? false;
        $this->reconciled = $entry->reconciled ?? false;
    }

    public function closeEntry()
    {
        $this->edit_id = null;
    }

    public function updateEntry()
    {
        $this->validate();

        Entry::find($this->edit_id)->update([
            'payee_id' => $this->payee_id ?? null,
            'name' => $this->name ?? null,
            'amount' => $this->amount,
            'scheduled' => $this->scheduled ?? false,
            'reconciled' => $this->reconciled ?? false,
        ]);

        $this->closeEntry();
    }

    public function deleteEntry()
    {
        Entry::find($this->edit_id)->delete();

        $this->closeEntry();
    }
}
