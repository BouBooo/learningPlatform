@extends('layouts.app')

@section('content')
 <!-- About Section Begin -->
 <section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Cours pour commencer</h2>
                    <p class="f-para">There are several ways people can make money online. From selling products to advertising. In this article I am going to explain the concept of contextual advertising.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="courses">
                @foreach($courses as $course) 
                <div class="course my-5 row">
                    <div class="col-lg-5">
                        <div class="about-pic">
                            <img src="{{ $course->image }}" alt="Course img">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-text pt-0">
                            <h3>{{ $course->title }}</h3>
                            <p>{{ $course->subtitle }}</p>
                            <p>Par <b>{{ $course->user->name }}</b></p>
                            <span class="tag">{{ $course->category->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

@endsection