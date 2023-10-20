<?php

namespace App\View\Components\Entries;

use App\Models\Payday;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    /** @var \Illuminate\Support\Carbon */
    protected $date;

    /** @var string */
    public $label;

    /**
     * Create a new component instance.
     */
    public function __construct(Payday $payday, string $label = null)
    {
        $this->date = $payday->start_date;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return function($data)
        {
            // Set the href
            $data['attributes']['href'] = route('entries', [
                'date' => $this->date->format('Y-m-d'),
            ]);

            return 'shared.link';
        };
    }
}
