<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class SubjectCreate extends Component
{
    public $code;
    public $subject;
    public $alert;

    /**
     * Prepare the data for validation.
     *
     * @return void
     */

    protected function prepareForValidation($attributes)
    {
        $attributes['code'] = $this->sanitizeCode($attributes['code']);

        return $attributes;
    }

    // Validation rules
    protected $rules = [
        'code' => 'required|string|max:10|unique:subjects,code',
        'subject' => 'required|string|max:75',
    ];

    public function save()
    {

        $subject = new Subject;

        $this->validate();

        $subject->code = $this->code;
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

    protected function sanitizeCode($code)
    {
        return str_replace(" ", "", strtoupper($code));
    }

    public function render()
    {
        return view('livewire.subject-create');
    }
}