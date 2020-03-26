<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Client\UdemyClient;

class MainController extends Controller
{
    public function __construct(UdemyClient $udemyClient) {
        $this->udemyClient = $udemyClient;
    }

    public function home() {
        $userId = [];
        $courses = Course::all();
        foreach($courses as $course) {
            array_push($userId, $course->user_id);
        }
        $ids = array_unique($userId);
        $instructors = User::whereIn('id', $ids)->get();
        $udemy = $this->udemyClient->getUdemyCourses();
        return view('main.home', [
            'courses' => $udemy['results'],
            'instructors' => $instructors
        ]);
    }
}
