@extends('layouts.app')

@section('content')

<!-- Blog Details Hero Section Begin -->
<section class="blog-hero-section set-bg pb-5" data-setbg="{{ asset('img/blog/blog-details/blog-details-hero.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bh-text">
                    <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><i
                            class="fa fa-play"></i></a>
                    <h2>{{ $course->title }}</h2>
                    <ul>
                        <li><span>Par <strong>{{ $course->user->name }}</strong></span></li>
                        <li>February 21, 2019</li>
                        <li>No Comments</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero Section End -->

<!-- Blog Details Section Begin -->
<section class="blog-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="bd-text">
                    <div class="bd-title text-center">
                        <h3>{{ $course->title }}</h3>
                        <div class="bd-tag-share">
                            <div class="tag d-flex justify-content-center">
                                <a href="#">{{ $course->category->name }}</a>
                            </div>
                        </div>
                        <h4 class="my-5">{{ $course->subtitle }}</h4>
                    </div>
                    <div class="bd-quote">
                        <p>As a result of your work, the senior leadership team walked away as a cohesive unit,
                            re-energized and more hopeful. We are committed to a new future which we now own. You
                            helped us learn how to be resilient change masters."</p>
                        <span>John Smith</span>
                        <img src="img/quote-left.png" alt="">
                    </div>
                    <div class="bd-more-text">
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="bd-more-pic">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/storage/courses/{{ $course->user_id }}/{{ $course->image }}" alt="">
                            </div>
                            <div class="col-md-6">
                                    <div class="price-item top-rated">
                                        <div class="tr-tag">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="pi-price mt-5">
                                            <h2><span>€</span>{{ $course->price }}</h2>
                                        </div>
                                        <a href="{{ route('cart.store', $course->id) }}" class="price-btn">M'inscrire <i class="fas fa-arrow-right"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>


<section class="related-post-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Ces cours peuvent vous intéresser</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($recommendations as $item)
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="/storage/courses/{{ $item->user_id }}/{{ $item->image }}">
                    <div class="bi-tag bg-gradient">{{ $item->category->name }}</div>
                    <div class="bi-text">
                        <h5><a href="#">{{ $item->title }}</a></h5>
                        <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection