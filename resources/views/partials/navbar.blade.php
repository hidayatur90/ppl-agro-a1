<nav class="sb-topnav navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0 mx-2" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <div class="sb-nav-link-icon mx-2"><img src="" alt=""></div>
    <img src="assets/img/Rodicord-logo.png" height="40" alt="RODICORD">

    <!-- Navbar-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li> --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>