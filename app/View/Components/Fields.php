<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class Fields extends Component
{
    /** @var string */
    public $prefix;

    /**
     * Make the field prefix if needed.
     *
     * @param  string  $type
     * @return string
     */
    protected function createPrefix($type)
    {
        if($type)
        {
            return $type . '-';
        }

        return null;
    }
}
