@extends('layouts.app')

@section('content')

@include('incs.instructor.course-sidebar')

<!-- Contact Form Section Begin -->
<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-5">Participants</h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</section>
<!-- Contact Form Section End -->

@endsection