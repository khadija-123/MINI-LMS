<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $courses = Course::all();
    return view('courses.index', compact('courses'));
}

public function create()
{
    return view('courses.create');
}

public function store(Request $request)
{
    Course::create($request->all());
    return redirect()->route('courses.index');
}
    
}
