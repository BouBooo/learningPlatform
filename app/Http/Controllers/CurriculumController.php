<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Managers\ImageUploadManager;

class CurriculumController extends Controller
{
    private $uploader;

    public function __construct(ImageUploadManager $uploader) {
        $this->uploader = $uploader;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $course = Course::find($id);
        $sections = Section::where('course_id', $course->id)->orderBy('id', 'ASC')->get();
        return view('instructor.curriculum.index', [
            'course' => $course,
            'sections' => $sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course = Course::find($id);
        return view('instructor.curriculum.create', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $course = Course::find($id);
        $section = new Section();
        $section->name = $request->request->get('section_name');
        $video = $this->uploader->storeVideo($request->file('section_video'));
        $section->video = $video;
        $section->course_id = $id;
        $section->save();
        return redirect()->route('curriculum.index', $course->id)->with('success', 'Votre plan de cours a bien été modifié.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $sectionId)
    {
        $course = Course::find($id);
        $section = Section::find($sectionId);
        $section->delete();
        return redirect()->back()->with('success', 'La section a bien été supprimée.');
    }
}
