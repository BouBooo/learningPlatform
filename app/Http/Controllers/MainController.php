<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Client\UdemyClient;

class MainController extends Controller
{
    public function __construct(UdemyClient $udemyClient) {
        $this->udemyClient = $udemyClient;
    }

    public function home() {
        $courses = $this->udemyClient->getUdemyCourses();
        return view('main.home', [
            'courses' => $courses['results']
        ]);
    }
}
