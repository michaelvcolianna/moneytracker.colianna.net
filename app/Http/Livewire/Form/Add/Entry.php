<?php

namespace App\Http\Livewire\Form\Add;

use App\Traits\HasHiddenForm;
use Livewire\Component;

class Entry extends Component
{
    use HasHiddenForm;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.add.entry');
    }
}
