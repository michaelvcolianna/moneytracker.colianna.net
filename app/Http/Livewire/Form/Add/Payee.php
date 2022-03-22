<?php

namespace App\Http\Livewire\Form\Add;

use App\Traits\HasHiddenForm;
use Livewire\Component;

class Payee extends Component
{
    use HasHiddenForm;

    /** @var boolean */
    public $areAnySelected;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('livewire.form.add.payee');
    }

    /**
     * Selects/deselects all
     *
     * @return void
     */
    public function selectAll()
    {
        // @todo Make a trait to handle this here & in update form
        $this->areAnySelected = !$this->areAnySelected;
    }
}
