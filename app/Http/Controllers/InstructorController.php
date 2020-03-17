<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function index() {
        $courses = Course::where('user_id', Auth::user()->id)->get();
        return view('instructor.index', [
            'courses' => $courses
        ]);
    }

    public function edit($id) {
        $course = Course::find($id);
        return view('instructor.edit', [
            'course' => $course
        ]);
    }
}
