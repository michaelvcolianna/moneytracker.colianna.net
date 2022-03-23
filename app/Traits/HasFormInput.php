<?php

namespace App\Traits;

trait HasFormInput
{
    /** @var string */
    public $error;
    public $help;
    public $id;
    public $label;

    /**
     * Set the input's common values
     *
     * @param  string  $error
     * @param  string  $help
     * @param  string  $id
     * @param  string  $label
     * @return void
     */
    protected function setDefaultValues($error = false, $help = null, $id, $label = null)
    {
        $this->error = $error;
        $this->help = $help;
        $this->id = $id;
        $this->label = $label ?? ucfirst($id);
    }
}
