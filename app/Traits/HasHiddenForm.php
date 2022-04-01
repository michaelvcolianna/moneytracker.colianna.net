<?php

namespace App\Traits;

trait HasHiddenForm
{
    /** @var boolean */
    public $isFormShowing = false;

    /**
     * Resets form values and closes the form
     *
     * @return void
     */
    public function clearForm()
    {
        $this->reset();
    }
}
