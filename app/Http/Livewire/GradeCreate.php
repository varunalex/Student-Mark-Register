<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Rules\UniqueClass;
use Livewire\Component;

class GradeCreate extends Component
{
    public $grade, $class, $alert;

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation($attributes)
    {
        $attributes['class'] = $this->sanitizeCode($attributes['class']);

        return $attributes;
    }

    public function save()
    {

        $validatedData = $this->validate([
            'grade' => ['required', 'integer', 'max:2', new UniqueClass($this->sanitizeCode($this->class))],
            'class' => ['required', 'string', 'max:1', new UniqueClass($this->grade)],
        ]);

        Grade::create($validatedData);

        // Reset fields
        $this->reset();
        $this->alert = true;
    }

    public function render()
    {
        return view('livewire.grade-create');
    }

    protected function sanitizeCode($code)
    {
        return str_replace(" ", "", strtoupper($code));
    }

    public function resetAlert()
    {
        $this->alert = false;
    }
}