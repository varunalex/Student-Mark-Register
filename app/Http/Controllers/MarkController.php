<?php

namespace App\Http\Controllers;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('marks');
    }

    public function create()
    {
        return view('marks.create');
    }
}