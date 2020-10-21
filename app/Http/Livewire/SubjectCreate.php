<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class SubjectCreate extends Component
{
    public $code;
    public $subject;
    public $alert;

    // Validation rules
    protected $rules = [
        'code' => 'required|string|max:10|unique:subjects,code',
        'subject' => 'required|string|max:75',
    ];

    public function save()
    {

        $subject = new Subject;

        $this->validate();

        $subject->code = strtoupper($this->code);
        $subject->subject = $this->subject;

        $subject->save();

        // Reset fields
        $this->reset();
        $this->alert = true;
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