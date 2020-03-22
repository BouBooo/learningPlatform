<?php

namespace App\Http\Controllers;

use App\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function courses() {
        $coursesUser = CourseUser::where('user_id', Auth::user()->id)->get();
        
        return view('participant.courses', [
            'coursesUser' => $coursesUser
        ]);
    }
}
