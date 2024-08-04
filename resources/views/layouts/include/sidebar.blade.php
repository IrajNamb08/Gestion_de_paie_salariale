<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
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
        </nav>
    </div>
</aside>