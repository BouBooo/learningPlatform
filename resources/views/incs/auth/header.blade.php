<nav class="mainmenu mobile-menu">
    <ul>
        <li class="active">
            <a href="#">
                <i class="fas fa-home"></i>
                Accueil
            </a>
        </li>
        <li>
            <a href="{{ route('courses.index') }}">
                <i class="fas fa-ellipsis-v"></i>
                Suivre un cours
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
            <a href="#">
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
        <li>
            <a class="nav-link" href="#">
               <img class="w-25 border-rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSLRJa7sVqIVz4olQJT_LAiFDkBBm8rhdJCrWVvb0bwX0dGNrVr"/>
            </a>
                <ul class="dropdown">
                    <li>
                        <div class="d-flex justify-content-between py-3 px-3">
                            <img class="avatar border-rounded" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSLRJa7sVqIVz4olQJT_LAiFDkBBm8rhdJCrWVvb0bwX0dGNrVr"/>
                            <div class="user-infos">
                                <p>{{ Auth::user()->name }}</p>
                                <small>{{ Auth::user()->email }}</small>
                            </div>
                        </div>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li><a href="#"><i class="fas fa-address-card"></i> Mes informations</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                </ul>
        </li>
    </ul>
</nav>
