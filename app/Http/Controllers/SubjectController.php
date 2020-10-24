<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('subjects');
    }

    /**
     * @param Request $request->id
     * @return void
     */
    public function edit(Request $request)
    {
        $subject_id = $request->id;
        $subject = Subject::where('id', $subject_id)->first();

        if (!$subject) {
            return abort(404);
        }

        return view('subject.edit', compact('subject_id', 'subject'));
    }

    public function create()
    {
        return view('subject.create');
    }
}