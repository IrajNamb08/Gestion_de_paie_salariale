<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('vendor/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{Route::is('accueil') ? 'active' : ''}}">
                    <a href="{{ route('accueil') }}">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                @if (Auth::user()->role == 'drh')
                    <li class="{{Route::is('drh.liste') ? 'active' : ''}}">
                        <a href="{{route('drh.liste')}}">
                            <i class="fas fa-sign-in-alt"></i>Accès
                        </a>
                    </li>
                @endif
                <li class="{{Route::is('employer.index') ? 'active' : ''}}">
                    <a href="{{route('employer.index')}}">
                        <i class="fas fa-user"></i>Employé
                    </a>
                </li>
                <li class="{{Route::is('departement.index') ? 'active' : ''}}">
                    <a href="{{route('departement.index')}}">
                        <i class="fas fa-box"></i>Département
                    </a>
                </li>
                <li class="{{Route::is('fonction.index') ? 'active' : ''}}">
                    <a href="{{route('fonction.index')}}">
                        <i class="far fa-check-square"></i>Fonction
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>