<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subjects');
    }

    public function edit(Request $request)
    {
        $subject_id = $request->id;
        $subject = Subject::where('id', $subject_id)->first();

        return view('subject.edit', compact('subject_id', 'subject'));
    }

    public function create()
    {
        return view('subject.create');
    }
}