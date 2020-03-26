@extends('layouts.instructor-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 jumbotron">
                <h3 class="mb-5">Participants</h3>
                @if($course->is_publised)
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Inscription</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Cours</th>
                        <th scope="col">Prix payé</th>
                        <th scope="col">Votre revenu</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $participant)
                        <tr>
                          <th>{{ $participant->created_at }}</th>
                          <td>{{ $participant->email }}</td>
                          <td>{{ $participant->course->title }}</td>
                          <td>{{ $participant->amount }} €</td>
                          <td>{{ $participant->instructor_part }} €</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  @else 
                  @endif
                  
                  <h4 class="text-center">Ces données seront disponibles une fois votre cours publié.</h4>
            </div>
        </div>
    </div>
</section>

@endsection