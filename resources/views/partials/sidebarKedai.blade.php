<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <style>
            nav {
                font-family: 'Poppins', sans-serif;
            }
        </style>
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="/kedai/home">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Data Akun</div>
                    <a class="nav-link" href="/profilKaryawanKedai">
                        <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                        Profil
                    </a>

                    <div class="sb-sidenav-menu-heading">Data Kopi</div>
                    <a class="nav-link" href="/kedaiStockKopi">
                        <div class="sb-nav-link-icon"><i class="fa fa-coffee"></i></div>
                        Stock Kopi
                    </a>
                    <a class="nav-link" href="/kedaiPenjualan/Keseluruhan">
                        <div class="sb-nav-link-icon"><i class="bi bi-cart-plus-fill"></i></div>
                        Penjualan
                    </a>
                    <a class="nav-link" href="/kedaiPrediksiPasar/Americano/Biji Kopi/Keseluruhan">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Prediksi
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as: </div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>

