<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
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
