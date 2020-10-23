<?php

namespace App\Http\Controllers;

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
}