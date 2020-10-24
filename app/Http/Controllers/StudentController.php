<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all students and filter by grade
     * @param Request $request->gradeId (optional)
     * @return void
     */
    public function index(Request $request)
    {
        $byGradeId = null;
        if (isset($request->gradeId)) {
            $byGradeId = $request->gradeId;
        }
        return view('students', compact('byGradeId'));
    }

    public function create()
    {
        return view('student.create');
    }

    /**
     * @param Request $request->id
     * @return void
     */
    public function edit(Request $request)
    {
        $student_id = $request->id;
        $student = Student::where('id', $student_id)->first();

        if (!$student) {
            return abort(404);
        }

        return view('student.edit', compact('student_id', 'student'));
    }

    /**
     * Render student profile page
     * @param Request $request->id
     * @return void
     */
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