<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $courses = Course::where('is_published', true)->get();
        $categories = Category::all();
        return view('courses.index', [
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    public function show($id) {
        $course = Course::find($id);
        if(Auth::user()->ownCourses->where('title', $course->title)->count() != 0 || Auth::user()->courses->where('title', $course->title)->count() != 0) {
            die('seems to be participant');
            return redirect()->route('participant.course', $course->slug);
        }
        $recommendations = Course::where('category_id', $course->category_id)->where('id', '!=', $course->id)->where('is_published', true)->limit(3)->get();
        return view('courses.show', [
            'course' => $course,
            'recommendations' => $recommendations
        ]);
    }

    public function category($id) {
        $category = Category::find($id);
        $categories = Category::all();
        $courses = Course::where('category_id', $category->id)->where('is_published', true)->get();
        return view('courses.category', [
            'category' => $category,
            'courses' => $courses,
            'categories' => $categories
        ]);
    }
}
