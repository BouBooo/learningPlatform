@extends('layouts.app')

@section('content')

@include('incs.instructor.course-sidebar')

<!-- Contact Form Section Begin -->
<section class="contact-from-section spad">
    <div class="container">
        @dump($course->sections)
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 pl-5 ml-5">
                <h3 class="mb-5">Programme</h3>
        
                <form id="form" action="{{ route('instructor.courses.curriculum.store', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <div class="d-flex justify-content-around mb-3">
                        <button id="btn" type="button" onClick="addField()" class="btn btn-dark">
                            <i class="fas fa-plus"></i>
                            Ajouter une section
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Sauvegarder
                        </button>
                    </div>
                    @if(count($course->sections) > 0)
                                    
                        @php 
                        $counter = 1
                        @endphp

                        @foreach($course->sections as $section) 
                        <div id="form-element" class="form-group">
                            <div class="jumbotron py-3">
                                <h4 class="my-3">Section {{ $counter }} :</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" id="section_name" name="section_name{{ $counter }}" value="{{ $section->name }}" placeholder="Nom du chapitre"/>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="file" id="section_video" name="section_video{{ $counter }}" value="{{ $section->video }}"/>
                                    </div>
                                    <div class="col-md-4">
                                        <video width="220" height="150" controls>
                                            <source src="{{ asset("storage/courses_sections/$course->user_id/$section->video") }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <button id="dummy" type="button" onClick="removeField()" class="btn btn-danger">Supprimer la section</button>
                        </div>
                        @php 
                        $counter++
                        @endphp
                        @endforeach
                    @endif
                    <div id="form-element" class="form-group">
                        <div class="jumbotron py-3">
                            <h4 class="my-3">Section 1 :</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="section_name" name="section_name" placeholder="Nom du chapitre"/>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" id="section_video" name="section_video"/>
                                </div>
                            </div>
                        </div>
                        <button id="dummy" type="button" onClick="removeField()" class="btn btn-danger">Supprimer la section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop

@section('stripe')

<script>
    let count = 1
    function addField() {
        p = document.getElementById("form-element")
        p_prime = p.cloneNode(true)
        p_prime.id = "form-element" + count
        parent = document.getElementById("form")
        parent.appendChild(p_prime)
        let name = p_prime.querySelector("#section_name")
        name.name = name.name + count
        let video = p_prime.querySelector("#section_video")
        video.name = video.name + count
        count++  
    }

    function removeField() {
        var lastChild = document.getElementById("form").lastChild;
        var lastChildID = lastChild.id;
        var elem = document.getElementById(lastChildID)
        elem.remove()
    }
</script>

@stop