<?php

namespace App\Traits;

trait HasFormInput
{
    /** @var string */
    public $help;
    public $id;
    public $label;
    public $test;

    /**
     * Set the input's common values
     *
     * @param  string  $help
     * @param  string  $id
     * @param  string  $label
     * @param  string  $test
     * @return void
     */
    protected function setDefaultValues($help = null, $id, $label = null, $test = null)
    {
        $this->help = $help;
        $this->id = $id;
        $this->label = $label ?? ucfirst($id);
        $this->test = $test ?? $id;
    }
}
