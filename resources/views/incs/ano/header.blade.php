<nav class="mainmenu mobile-menu">
    <ul>
        <li class="active">
            <a href="#">
                <i class="fas fa-home"></i>
                Accueil
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-ellipsis-v"></i>
                Catégories
            </a>
        </li>
        <li>
            <!-- Search form -->
            <form class="form-inline d-flex justify-content-center md-form form-sm active-pink-2 mt-2">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
            </form>
        </li>
        <li>
            <a href="{{ route('instructor.index') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                Formateur
            </a>
            <ul class="dropdown">
                <li><p class="px-2">Passez à la vue Formateur ici : revenez aux cours que vous enseignez.</p></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-book"></i>
                Mes cours
            </a>
                <ul class="dropdown">
                    <li><a href="#">cours</a></li>
                    <li><a href="#">cours</a></li>
                    <li><a href="#">cours</a></li>
                </ul>
        </li>
    </ul>
</nav>
<a href="{{ route('login') }}" class="primary-btn top-btn"><i class="fas fa-user"></i> Connexion</a>