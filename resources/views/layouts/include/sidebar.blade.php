<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('vendor/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list sidestyle">
                <li class="{{Route::is('accueil') ? 'active' : ''}}">
                    <a href="{{ route('accueil') }}">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                @if (Auth::user()->role == 'drh')
                    <li class="{{Route::is('drh.liste') || Route::is('drh.ajout') || Route::is('drh.edit') ? 'active' : ''}}">
                        <a href="{{route('drh.liste')}}">
                            <i class="fas fa-sign-in-alt"></i>Accès
                        </a>
                    </li>
                @endif
                <li class="{{Route::is('employer.index') || Route::is('employer.ajout') || Route::is('employer.edit') ? 'active' : ''}}">
                    <a href="{{route('employer.index')}}">
                        <i class="fas fa-user"></i>Employé
                    </a>
                </li>
                <li class="{{Route::is('departement.index') || Route::is('departement.ajout') || Route::is('departement.edit')  ? 'active' : ''}}">
                    <a href="{{route('departement.index')}}">
                        <i class="far fa-building"></i>Département
                    </a>
                </li>
                <li class="{{Route::is('fonction.index') || Route::is('fonction.ajout') || Route::is('fonction.edit') ? 'active' : ''}}">
                    <a href="{{route('fonction.index')}}">
                        <i class="fas fa-briefcase"></i>Fonction
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>