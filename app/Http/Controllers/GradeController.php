<?php

namespace App\Http\Controllers;

class GradeController extends Controller
{
    public function create()
    {
        return view('grade.create');
    }

    public function index()
    {
        return view('grades');
    }
}