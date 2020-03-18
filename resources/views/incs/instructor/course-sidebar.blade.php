<!-- Side navigation -->
<div class="sidenav">
    <h3 class="px-3 text-white">Modification du cours</h3>
    <a href="#">Ciblez vos participants</a>
    <a href="#">Programme</a>
    <a href="{{ route('instructor.courses.edit', $course->id) }}">Page d'accueil du cours</a>
    <hr>
    <h3 class="px-3 text-white">Gestion du cours</h3>
    <a href="{{ route('instructor.courses.pricing', $course->id) }}">Tarification</a>
    <a href="#">Promotions</a>
    <a href="{{ route('instructor.courses.participants', $course->id) }}">Participants</a>
</div>
