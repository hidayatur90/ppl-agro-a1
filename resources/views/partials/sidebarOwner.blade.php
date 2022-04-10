<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <style>
            nav {
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            {{-- <div class="sb-nav-link-icon mx-2 justify-content-end">
                <img src="assets/img/Rodicord-logo.png" height="30" alt="RODICORD">
            </div> --}}
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="../home">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Data Akun</div>
                    <a class="nav-link" href="/ownerMitra">
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                        Akun
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                        Karyawan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="/karyawanKedai">
                                Kedai Kopi
                            </a>
                            <a class="nav-link" href="/karyawanProduksi">
                                Produksi Kopi
                            </a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Data Kopi</div>
                    <a class="nav-link" href="/ownerStockKopi">
                        <div class="sb-nav-link-icon"><i class="fa fa-coffee"></i></div>
                        Stock Kopi
                    </a>
                    <a class="nav-link" href="/bahanBaku">
                        <div class="sb-nav-link-icon"><i class="fa fa-cubes"></i></i></div>
                        Bahan Baku
                    </a>
                    <a class="nav-link" href="/prediksiPasar">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Penjualan
                    </a>
                    <a class="nav-link" href="/rekapitulasi">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Keuangan
                    </a>
                    <a class="nav-link" href="/prediksiPasar">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Prediksi
                    </a>
                    {{-- <a class="nav-link" href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        {{ __('Logout') }}
                    </a>
                    <?php
                        // alert()->question('Are you sure?','You won\'t be able to revert this!')
                        // ->showConfirmButton('Yes! Delete it', '#3085d6')
                        // ->showCancelButton('Cancel', '#aaa')->reverseButtons();
                    ?>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> --}}

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as: </div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>

