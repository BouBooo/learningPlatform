<!-- Side navigation -->
<div class="sidenav">
    <a class="no-attributes" href="{{ route('instructor.index') }}"><span class="h3"><i class="fas fa-arrow-left"></i> Mes cours</span></a>
    <hr>
    <h3 class="px-3 text-white">Modification</h3>
    <a href="{{ route('curriculum.index', $course->id) }}">Programme</a>
    <a href="{{ route('instructor.courses.edit', $course->id) }}">Page d'accueil</a>
    <hr>
    <h3 class="px-3 text-white">Gestion</h3>
    <a href="{{ route('instructor.courses.pricing', $course->id) }}">Tarification</a>
    <a href="#">Promotions</a>
    <a href="{{ route('instructor.courses.participants', $course->id) }}">Participants</a>
</div>
