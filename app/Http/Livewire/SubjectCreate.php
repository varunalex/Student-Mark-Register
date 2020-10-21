<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubjectCreate extends Component
{
    public $code;
    public $subject;
    public $alert;

    // Validation rules
    protected $rules = [
        'code' => 'required|string|max:10',
        'subject' => 'required|string|max:50',
    ];

    public function save()
    {

        $this->validate();

        session()->flash('message', 'Subject created!');

        $this->reset();

        $this->alert = true;

        // $this->post->save();
    }

    public function resetAlert()
    {
        $this->alert = false;
    }

    public function render()
    {
        return view('livewire.subject-create');
    }
}