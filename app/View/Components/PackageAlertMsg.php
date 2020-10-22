<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PackageAlertMsg extends Component
{
    public $on, $reset;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($on = '', $reset = 'yes')
    {
        $this->on = $on;
        $this->reset = $reset;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.package-alert-msg');
    }
}