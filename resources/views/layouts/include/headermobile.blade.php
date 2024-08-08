<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
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
        </div>
    </nav>
</header>