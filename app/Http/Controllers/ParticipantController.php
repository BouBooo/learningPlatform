<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function courses() {
        $coursesUser = CourseUser::where('user_id', Auth::user()->id)->get();
        
        return view('participant.courses', [
            'coursesUser' => $coursesUser
        ]);
    }

    public function course($slug) {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('participant.course', [
            'course' => $course
        ]);
    }

    public function section($slug, $sectionSlug) {
        $course = Course::where('slug', $slug)->firstOrFail();
        $section = Section::where('slug', $sectionSlug)->firstOrFail();
        return view('participant.section', [
            'course' => $course,
            'section' => $section
        ]);
    }
}
