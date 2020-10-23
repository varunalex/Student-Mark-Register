<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class StudentCreate extends Component
{
    // public $stu = [
    //     'f_name' => '',
    //     'l_name' => '',
    //     'initials' => '',
    //     'reg_no' => '',
    //     'address' => '',
    //     'dob' => '',
    //     'gender' => '',
    //     'guardian' => '',
    //     'grade_id' => '',
    // ];

    public $student;
    public $alert, $genders, $grades;

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