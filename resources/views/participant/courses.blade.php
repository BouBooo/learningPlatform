@extends('layouts.app')

@section('content')

<section class="latest-blog spad">
    <div class="container">
        <h2 class="text-center">Mes cours</h2>
        <div class="jumbotron row">
            <div class="courses">
                @foreach($coursesUser as $item) 
                @php 
                $course = $item->course 
                @endphp
                <div class="course my-5 row">
                    <div class="col-lg-3">
                        <div class="about-pic">
                            <a href="{{ route('courses.show', $course->id) }}">
                                <img src="/storage/courses/{{ $course->user_id }}/{{ $course->image }}" alt="Course img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-text pt-0">
                            <h3>{{ $course->title }}</h3>
                            <p>{{ $course->subtitle }}</p>
                            <p>Par <b>{{ $course->user->name }}</b></p>
                            <span class="tag">{{ $course->category->name }}</span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="primary-btn">
                            Continuer
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</section>

@stop