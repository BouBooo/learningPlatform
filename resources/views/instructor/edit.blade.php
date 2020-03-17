@extends('layouts.app')

@section('content')


<!-- Contact Form Section Begin -->
<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action="#" class="comment-form contact-form" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Titre du cours</label>
                            <input type="text" placeholder="Name" name="title" value="{{ $course->title }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="subtitle">Sous-titre du cours</label>
                            <input type="text" placeholder="Email" name="subtitle" value={{ $course->subtitle }}>
                        </div>
                        <div class="col-lg-12">
                            <label for="description">Description du cours</label>
                            <textarea type="textarea" placeholder="Phone" name="description">{{ $course->description }}</textarea>
                        </div>
                        <div class="col-lg-12">
                            <label for="image">Image du cours</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{ $course->image }}"/>
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="image"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Section End -->

@endsection