<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('students');
    }

    public function create()
    {
        return view('student.create');
    }

    public function edit(Request $request)
    {
        $student_id = $request->id;
        $student = Student::where('id', $student_id)->first();

        if (!$student) {
            return abort(404);
        }

        return view('student.edit', compact('student_id', 'student'));
    }

    public function profile(Request $request)
    {
        $student_id = $request->id;
        $student = Student::where('id', $student_id)->first();

        if (!$student) {
            return abort(404);
        }

        // Calc age
        $student->age = Carbon::parse($student->dob)->diff(Carbon::now())->format('%y years, %m months and %d days');

        return view('student.profile', compact('student'));
    }
}