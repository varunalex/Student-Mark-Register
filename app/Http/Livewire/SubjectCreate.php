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
        'code' => 'required|string|max:10|alpha_dash|unique:subjects,code',
        'subject' => 'required|string|max:75',
    ];

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

    public function save()
    {

        $validatedData = $this->validate();

        Subject::create($validatedData);

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