<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PackageSelect extends Component
{
    public $message;
    public $errorClass;
    public $label;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = '', $errorClass = '', $label = '', $options = [])
    {
        $this->message = $message;
        $this->errorClass = $errorClass;
        $this->label = $label;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.package-select');
    }
}