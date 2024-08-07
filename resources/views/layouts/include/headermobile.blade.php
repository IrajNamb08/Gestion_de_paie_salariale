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
                @if (Auth::user()->role == 'drh')
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-user"></i>Accès Utilisateur</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{route('drh.ajout')}}">Ajout</a>
                            </li>
                            <li>
                                <a href="{{route('drh.liste')}}">Liste</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="{{route('employer.index')}}">
                        <i class="fas fa-user"></i>Employé
                    </a>
                </li>
                <li>
                    <a href="{{route('departement.index')}}">
                        <i class="fas fa-box"></i>Département
                    </a>
                </li>
                <li>
                    <a href="{{route('fonction.index')}}">
                        <i class="far fa-check-square"></i>Fonction
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>