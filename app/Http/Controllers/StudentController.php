<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        if (!$student) {
            return abort(404);
        }

        $student_id = $request->id;
        $student = Student::where('id', $student_id)->first();

        return view('student.edit', compact('student_id', 'student'));
    }
}