
<div class="bd-title text-center">
    <div class="bd-tag-share">
        <div class="tag d-flex justify-content-around">
            @foreach($categories as $category)
                <a class="primary-btn" href="{{ route('courses.category', $category->id) }}">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>