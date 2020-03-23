@extends('layouts.app')

@section('content')

@include('incs.instructor.course-sidebar')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 pl-5 ml-5">
                <h3 class="text-center mb-5">Programme</h3>    
                @if(count($course->sections) > 0) 
                    <div class="text-center">
                        <a class="btn btn-dark mb-3" href="{{ route('curriculum.create', $course->id) }}">Ajouter une section</a>
                    </div>
                    <table class="table table-striped">
                        <tbody>
                            @foreach($sections as $section)
                            <tr>
                                <th>
                                    {{ $section->name }}
                                </th>
                                <td>
                                    <video width="350" height="130" controls>
                                        <source src="{{ asset("storage/courses_sections/$course->user_id/$section->video") }}" type="video/mp4">
                                    </video>
                                </td>
                                <td>
                                    <a href="{{ route('curriculum.destroy', [
                                            'id' => $course->id,
                                            'section' => $section->id
                                        ]) }}" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else               
                <div class="text-center">
                    <p>Votre cours ne contient aucun contenu vidéo.</p>
                    <a class="btn btn-dark" href="{{ route('curriculum.create', $course->id) }}">Créer ma première section</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@stop

@section('stripe')

{{-- <script>
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
</script> --}}

@stop