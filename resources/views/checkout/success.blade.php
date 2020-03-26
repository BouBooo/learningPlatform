@extends('layouts.app')

@section('content')

@foreach($order as $item)
<div class="row justify-content-center">
    <div class="card w-25 mx-5">
        <img src="/storage/courses/{{ $item->model->user_id }}/{{ $item->model->image}}">
        <div class="card-body">
            <div class="action d-flex justify-content-between mx-5">
                <p>
                    <i class="fas fa-clock"></i>
                    04/02/2018
                </p>
                <p>Par {{ $item->model->user->name }}
            </div>
            <p class="card-text">{{ $item->model->subtitle }}</p>
        </div>
        <div class="action d-flex justify-content-around my-3">
            <a href="{{ route('participant.course', $item->model->id) }}" class="primary-btn w-75">
                <i class="fas fa-graduation-cap"></i>
                Commencer
            </a>
        </div>
    </div>
</div>
@endforeach

@stop