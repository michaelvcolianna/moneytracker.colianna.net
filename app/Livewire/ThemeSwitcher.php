<?php

namespace App\Livewire;

use Closure;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class ThemeSwitcher extends Component
{
    /** @var boolean */
    public $dark;

    /**
     * Create a new component instance.
     */
    public function mount(): void
    {
        $this->dark = auth()?->user()?->dark;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('shared.theme-switcher');
    }

    /**
     * Change the theme.
     */
    public function switchTheme(): Redirector
    {
        auth()->user()->switchTheme();

        return redirect(request()->header('Referer'));
    }
}
