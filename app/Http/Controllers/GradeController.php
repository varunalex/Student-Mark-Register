<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('grade.create');
    }

    /**
     * @param Request $request->id
     * @return void
     */
    public function edit(Request $request)
    {
        $grade_id = $request->id;
        $grade = Grade::where('id', $grade_id)->first();

        if (!$grade) {
            return abort(404);
        }

        return view('grade.edit', compact('grade_id', 'grade'));
    }

    public function index()
    {
        return view('grades');
    }
}