<?php

namespace App\View;

use Illuminate\View\Component as ViewComponent;

abstract class Component extends ViewComponent
{
    /**
     * Add an icon class to a component.
     *
     * @param  array  $attribute
     * @param  string  $icon
     * @return string
     */
    protected function addIcon($attribute, $icon)
    {
        $classes = explode(' ', $attribute);
        $classes[] = 'icon';
        $classes[] = 'icon--' . $icon;

        return implode(' ', $classes);
    }
}
