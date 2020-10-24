<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class StudentCreate extends Component
{

    public $student;
    public $alert, $genders, $grades;

    // Validation rules
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

    // Custom validation messages
    protected $messages = [
        'student.gender.max' => 'The gender is required',
        'student.grade_id.integer' => 'The grade & class is required',
    ];

    public function __construct()
    {
        $this->student = new Student;
    }

    public function mount()
    {
        $this->genders = ['M' => 'Male', 'F' => 'Female'];
        $this->grades = Grade::all();
    }

    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['student']['reg_no'] = strtoupper($validatedData['student']['reg_no']);
        Student::create($validatedData['student']);

        // Reset fields
        $this->student = [];
        $this->alert = true;
    }

    public function render()
    {
        return view('livewire.student-create');
    }

    public function resetAlert()
    {
        $this->alert = false;
    }
}