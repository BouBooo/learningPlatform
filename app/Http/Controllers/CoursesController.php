<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index() {
        $courses = Course::all();
        return view('courses.index', [
            'courses' => $courses
        ]);
    }

    public function show($id) {
        $course = Course::find($id);
        $recommendations = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->limit(3)->get();
        return view('courses.show', [
            'course' => $course,
            'recommendations' => $recommendations
        ]);
    }
}
