<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class StudentEdit extends Component
{
    public $student, $temp_reg_no;
    public $genders, $grades;

    protected $rules = [
        'student.f_name' => 'required|string|max:15',
        'student.l_name' => 'required|string|max:15',
        'student.initials' => 'required|string|max:15',
        'student.reg_no' => 'required|string|max:10|alpha_dash|unique:students,reg_no',
        'student.address' => 'required|string|max:255',
        'student.dob' => 'required|date',
        'student.gender' => 'required|string|max:1',
        'student.guardian' => 'required|string|max:100',
        'student.grade_id' => 'required|integer|exists:grades,id',
    ];

    protected $validationAttributes = [
        'student.f_name' => 'first name',
        'student.l_name' => 'last name',
        'student.initials' => 'initials',
        'student.reg_no' => 'registration number',
        'student.address' => 'address',
        'student.dob' => 'date of birth',
        'student.gender' => 'gender',
        'student.guardian' => 'guardian',
        'student.grade_id' => 'grade & class',
    ];

    protected $messages = [
        'student.gender.max' => 'The gender is required',
        'student.grade_id.integer' => 'The grade & class is required',
    ];

    public function __construct()
    {
        $this->student = new Student;
    }

    public function mount($student)
    {
        $this->genders = ['M' => 'Male', 'F' => 'Female'];
        $this->grades = Grade::all();
        $this->student = $student;
        $this->temp_reg_no = $student->reg_no;

    }

    public function update()
    {
        // Skip unique validation if the value is not changed
        if ($this->temp_reg_no == $this->student->reg_no) {
            $this->rules['student.reg_no'] = 'required|string|max:10|alpha_dash';
        }

        $validatedData = $this->validate();

        Student::where('id', $this->student->id)
            ->update($validatedData['student']);

        session()->flash('alert', true);
        return redirect()->to('students');
    }

    public function render()
    {
        return view('livewire.student-edit');
    }
}