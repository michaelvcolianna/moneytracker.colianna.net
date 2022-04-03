<?php

namespace App\View\Components\Fields;

use App\View\Components\Fields;

class Entry extends Fields
{
    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Entry  $entry
     * @return void
     */
    public function __construct($entry)
    {
        $id = $entry->id ?? 'new';
        $this->prefix = $this->createPrefix('entry-' . $id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fields.entry');
    }
}
