<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class Fields extends Component
{
    /** @var boolean */
    public $add;

    /** @var string */
    public $prefix;

    /**
     * Set the abstract values.
     *
     * @param  mixed  $model
     * @param  string  $type
     * @return void
     */
    protected function setValues($model, $type)
    {
        $this->add = $model->id
            ? false
            : true
            ;

        $id = $model->id ?? 'new';
        $this->prefix = implode('-', [$type, $id]) . '-';
    }
}
