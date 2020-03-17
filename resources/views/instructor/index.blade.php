@extends('layouts.app')

@section('content')

<section class="related-post-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Cours</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($courses as $course) 
            <div class="col-md-4">
                <div class="card-body">
                    <div class="bi-text">
                        <h5><a class="section-title" href="#">{{ $course->title }}</a></h5>
                        <span><i class="fa fa-clock-o"></i> {{ date('d/m/Y', strtotime($course->created_at)) }}</span>
                    </div>
                </div>
                <div class="blog-item set-bg" data-setbg="{{ $course->image }}">
                </div>
                <div class="btn-actions d-flex justify-content-center">
                    <a href="{{ route('instructor.courses.edit', $course->id) }}" class="primary-btn">
                        <i class="fas fa-edit"></i>
                        Modifier
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection