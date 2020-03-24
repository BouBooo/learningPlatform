<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use App\Category;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Managers\ImageUploadManager;

class InstructorController extends Controller
{
    private $uploader;

    public function __construct(ImageUploadManager $uploader) {
        $this->uploader = $uploader;
        $this->middleware('auth');
    }

    public function index() {
        $courses = Course::where('user_id', Auth::user()->id)->get();
        return view('instructor.index', [
            'courses' => $courses
        ]);
    }

    public function edit($id) {
        $categories = Category::all();
        $course = Course::find($id);
        return view('instructor.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        $course = Course::find($id);
        $slugify = new Slugify();
        $categoryId = $request->request->get('category');

        if($request->file('image')) {
            $fullFileName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $file = $fileName . '_' . time() . '.'. $extension;
            $request->file('image')->storeAs('public/courses/' . Auth::user()->id, $file);
            $course->image = $file;
        }


        $course->title = $request->request->get('title');
        $course->slug = $slugify->slugify($course->title);
        $course->subtitle = $request->request->get('subtitle');
        $course->description = $request->request->get('description');
        $course->category_id = Category::find($categoryId)->id;
        $course->user_id = Auth::user()->id;
        $course->save();

        return redirect()->route('instructor.courses.edit', $course->id)->with('success', 'Vos modifications ont bien été appliquées.');
    }

    public function create() {
        $categories = Category::all();
       return view('instructor.create', [
           'categories' => $categories
       ]);
    }
    
    public function store(Request $request) {
        $course = new Course();
        $slugify = new Slugify();
        $categoryId = $request->request->get('category');

        $fullFileName = $request->file('image')->getClientOriginalName();
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $file = $fileName . '_' . time() . '.'. $extension;
        $request->file('image')->storeAs('public/courses/' . Auth::user()->id, $file);


        $course->title = $request->request->get('title');
        $course->slug = $slugify->slugify($course->title);
        $course->subtitle = $request->request->get('subtitle');
        $course->description = $request->request->get('description');
        $course->category_id = Category::find($categoryId)->id;
        $course->user_id = Auth::user()->id;
        $course->image = $file;
        $course->save();

        return redirect()->route('instructor.courses.edit', $course->id)->with('success', 'Votre cours a bien été créé. Il vous reste encore quelques informations à ajouter avant sa mise en ligne');
    }

    public function pricing($id) {
        $course = Course::find($id);
        return view('instructor.pricing', [
            'course' => $course
        ]);
    }

    public function pricingStore(Request $request, $id) {
        $course = Course::find($id);
        $course->price = $request->request->get('price');
        $course->save();
        return redirect()->route('instructor.courses.edit', $course->id)->with('success', 'Le prix de votre cours a bien été mis à jour.');
    }

    public function participants($id) {
        $course = Course::find($id);
        return view('instructor.participants', [
            'course' => $course
        ]);
    }
}
