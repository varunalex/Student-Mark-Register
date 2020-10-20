<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PackageInput extends Component
{
    public $message;
    public $errorClass;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = '', $errorClass = '', $label = '')
    {
        $this->message = $message;
        $this->errorClass = $errorClass;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.package-input');
    }
}