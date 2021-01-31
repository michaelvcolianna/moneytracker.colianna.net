<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payee;

class Payees extends Component
{
    public function render()
    {
        $payees = Payee::orderBy('name')->paginate(25);

        return view('livewire.payees', [
            'payees' => $payees,
        ]);
    }
}
