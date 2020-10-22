<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function create()
    {
        return view('grade.create');
    }

    public function edit(Request $request)
    {
        $grade_id = $request->id;
        $grade = Grade::where('id', $grade_id)->first();

        return view('grade.edit', compact('grade_id', 'grade'));
    }

    public function index()
    {
        return view('grades');
    }
}