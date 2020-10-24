<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Rules\UniqueClass;
use Livewire\Component;

class GradeEdit extends Component
{
    public $grade_id, $grade, $class, $alert;

    // Validation rules

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

    public function mount($grade)
    {
        $this->grade_id = $grade->id;
        $this->grade = $grade->grade;
        $this->class = $grade->class;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'grade' => ['required', 'integer', 'max:2', new UniqueClass($this->sanitizeCode($this->class))],
            'class' => ['required', 'string', 'max:1', new UniqueClass($this->grade)],
        ]);

        Grade::where('id', $this->grade_id)
            ->update($validatedData);

        $this->grade = $validatedData['grade'];
        $this->class = $validatedData['class'];

        session()->flash('alert', true);
        return redirect()->to('grade');
    }

    public function render()
    {
        return view('livewire.grade-edit');
    }

    protected function sanitizeCode($code)
    {
        return str_replace(" ", "", strtoupper($code));
    }
}