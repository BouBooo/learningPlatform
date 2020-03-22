<nav class="mainmenu mobile-menu">
    <ul>
        <li class="active">
            <a href="{{ route('home') }}">
                <i class="fas fa-home"></i>
                Accueil
            </a>
        </li>
        <li>
            <a href="{{ route('courses.index') }}">
                <i class="fas fa-ellipsis-v"></i>
                Suivre un cours
            </a>
            <ul class="dropdown px-2 py-3">
                @foreach(App\Category::all() as $category)
                <li>
                    <a href="{{ route('courses.category', $category->id) }}">
                    {!! $category->icon !!}
                    {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
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
            <a href="{{ route('participant.courses') }}">
                <i class="fas fa-book"></i>
                Mes cours
            </a>
                <ul class="dropdown">
                    @foreach(Auth::user()->courses as $course)
                    <li><a href="#">{{ $course->title }}</a></li>
                    @endforeach
                </ul>
        </li>
        <li>
            <a href="{{ route('cart.index') }}">
                <i class="fas fa-shopping-cart"></i>
                @if(count(\Cart::session(Auth::user()->id)->getContent()) > 0)
                <span class="badge badge-pill badge-danger">{{ count(\Cart::session(Auth::user()->id)->getContent()) }}</span>
               @endif
            </a>
            @if(count(\Cart::session(Auth::user()->id)->getContent()) > 0)
            <ul class="dropdown px-2 py-2">
                @foreach(\Cart::session(Auth::user()->id)->getContent() as $item) 
                <li>
                    <div class="d-flex">
                        <img class="avatar border-rounded" src="/storage/courses/{{ $item->model->user_id }}/{{ $item->model->image }}"/>
                        <div class="user-infos ml-3">
                            <small>{{ $item->model->title }}</small>
                            <p class="text-danger">{{ $item->price}} €</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else 
            <ul class="dropdown px-2 py-2 text-center">
                <li>
                    <div class="empty-cart">
                        <p>Votre panier est vide.</p>
                        <a class="btn btn-link" href="{{ route('courses.index') }}">Continuez vos achats</a>
                    </div>
                </li>
            </ul>
            @endif
        </li>
        <li>
            <a href="{{ route('cart.index') }}">
                <i class="fas fa-heart"></i>
                @if(count(\Cart::session(Auth::user()->id.'wishlist')->getContent()) > 0)
                <span class="badge badge-pill badge-danger">{{ count(\Cart::session(Auth::user()->id.'wishlist')->getContent()) }}</span>
               @endif
            </a>
            @if(count(\Cart::session(Auth::user()->id.'wishlist')->getContent()) > 0)
            <ul class="dropdown px-2 py-2">
                @foreach(\Cart::session(Auth::user()->id.'wishlist')->getContent() as $item) 
                <li>
                    <div class="d-flex">
                        <img class="avatar border-rounded" src="/storage/courses/{{ $item->model->user_id }}/{{ $item->model->image }}"/>
                        <div class="user-infos ml-3">
                            <small>{{ $item->model->title }}</small>
                            <p class="text-danger">{{ $item->price}} €</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else 
            <ul class="dropdown px-2 py-2 text-center">
                <li>
                    <div class="empty-cart">
                        <p>Votre liste de souhaits est vide.</p>
                        <a class="btn btn-link" href="{{ route('courses.index') }}">Découvrez les cours</a>
                    </div>
                </li>
            </ul>
            @endif
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
