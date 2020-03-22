@extends('layouts.app')

@section('content')

@include('incs.instructor.course-sidebar')

<!-- Contact Form Section Begin -->
<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-5">Programme</h3>
        
                <form id="form" action="{{ route('instructor.courses.curriculum.store', $course->id) }}" method="POST">
                    @csrf 
                    <div class="d-flex justify-content-around mb-3">
                        <button id="btn" type="button" onClick="addField()" class="btn btn-dark">
                            <i class="fas fa-plus"></i>
                            Ajouter un champ
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Sauvegarder
                        </button>
                    </div>
                    <div id="form-element" class="form-group">
                        <div class="jumbotron py-3">
                            <h4 class="my-3">Exemple :</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="section_name" placeholder="Nom du chapitre"/>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="section_video"/>
                                </div>
                            </div>
                        </div>
                        <button id="dummy" type="button" onClick="removeField()" class="btn btn-danger">Supprimer la section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop

@section('stripe')

<script>
    let count = 1
    function addField() {
        console.log('add field action')
        p = document.getElementById("form-element")
        p_prime = p.cloneNode(true)
        p_prime.id = "form-element" + count
        parent = document.getElementById("form")
        parent.appendChild(p_prime)
        count++  
        console.log(count)
    }

    function removeField() {
        var lastChild = document.getElementById("form").lastChild;
        var lastChildID = lastChild.id;
        console.log(lastChildID)
        var elem = document.getElementById(lastChildID)
        elem.remove()
    }
</script>

@stop