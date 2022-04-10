<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<nav class="sb-topnav navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0 mx-2" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <div class="sb-nav-link-icon mx-2">
        <img src="../../assets/img/Rodicord-logo.png" height="40" alt="RODICORD">
    </div>
    <!-- Navbar-->
    <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="('#exampleModal, #logout-form').attr('action','{{ route('logout') }}')">{{ __('Logout') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <h1 class="h2">
                <i class="fa fa-exclamation-circle mt-5" aria-hidden="true" style="font-size: 120px; color: #e62929;"></i>
            </h1>
            <div class="modal-body my-2" style="text-align: center">
                <h4>Apakah Anda yakin ingin Logout?</h4>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">YA</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TIDAK</button>
                </form>
            </div>
      </div>
    </div>
</div>
