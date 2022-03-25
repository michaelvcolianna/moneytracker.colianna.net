<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Layout extends Component
{
    /** @var array<string> */
    public $git;

    /** @var string */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @return void
     */
    public function __construct($title)
    {
        $this->git = $this->getGitData();
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layout');
    }

    /**
     * Retrieves Git information
     *
     * @return array<string>
     */
    protected function getGitData(): array
    {
        // Regex the branch name out of the HEAD
        $git['branch'] = rtrim(preg_replace('/(.*?\/){2}/', '', file_get_contents(base_path('.git/HEAD'))));

        // Build the path to the branch data
        $path = base_path('.git/refs/heads/' . $git['branch']);

        // Get the hash & date for the branch
        $git['hash'] = substr(file_get_contents($path), 0, 7);
        $git['date'] = date(DATE_ATOM, filemtime($path));

        return $git;
    }
}
