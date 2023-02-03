<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Entries extends Component
{
    /** @var \App\Models\Payday */
    protected $payday;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function mount()
    {
        $this->payday = session('payday');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('pages.entries', [
            'payday' => $this->payday->refresh(),
        ]);
    }
}
