<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="assets/img/sidebar/logo.png" alt="uLibrary Logo" style="width: 44px;">  
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="assets/img/sidebar/logo2.png" alt="uLibrary Logo" style="width: 120px; margin-left: -10px; margin-top: 6px;">  
            <!-- <img src="assets/img/logo/uLibrary-logo.png" alt="uLibrary Logo" style="width: 170px;"> -->
        </div>
    </a>
    <?php if(isset($_SESSION['id_role'])) : ?>
        <?php if($_SESSION['id_role'] == 1) : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="index.php?include=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Master Data -->
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-solid fa-layer-group"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?include=buku"><i class="fas fa-fw fa-book mr-1"></i> Data Buku</a>
                        <a class="collapse-item" href="index.php?include=kategori-buku"><i class="fas fa-fw fa fa-list-alt mr-1"></i> Data Kategori Buku</a>
                        <a class="collapse-item" href="index.php?include=penerbit"><i class="fas fa-fw fa-book-reader mr-1"></i> Data Penerbit</a>
                        <!-- <a class="collapse-item" href="index.php?include=users">Data Users</a> -->
                        <a class="collapse-item" href="index.php?include=role"><i class="fas fa-fw fa-cog mr-1"></i> Data Role</a>
                        <a class="collapse-item" href="index.php?include=denda"><i class="fas fa-fw fa-solid fa-money-bill mr-1"></i> Data Denda</a>
                        <a class="collapse-item" href="index.php?include=rak"><i class="fa fa-fw fa-server mr-1"></i> Data Rak</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTransaksiPeminjaman"
                    aria-expanded="true" aria-controls="collapseTransaksiPeminjaman">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transaksi Peminjaman</span>
                </a>
                <div id="collapseTransaksiPeminjaman" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?include=peminjaman">Data Peminjaman Buku</a>
                        <a class="collapse-item" href="index.php?include=tambah-peminjaman">Peminjaman Buku</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTransaksiPengembalian"
                    aria-expanded="true" aria-controls="collapseTransaksiPengembalian">
                    <i class="fas fa-fw fa fa-undo"></i>
                    <span>Transaksi Pengembalian</span>
                </a>
                <div id="collapseTransaksiPengembalian" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?include=pengembalian">Data Pengembalian Buku</a>
                        <a class="collapse-item" href="index.php?include=tambah-pengembalian">Pengembalian Buku</a>
                    </div>
                </div>
            </li>
            
            <!-- Nav Item - Konfirmasi Booking -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="index.php?include=konfirmasi-booking">
                <i class="fas fa-fw fa-solid fa-check-circle"></i>
                    <span>Konfirmasi Booking</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Nav Item - Laporan -->
            <li class="nav-item mb-3">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                    aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-fw fa-solid fa-file"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar" style="width: 200px;">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?include=laporan-data-buku">Laporan Data Buku</a>
                        <a class="collapse-item" href="index.php?include=laporan-data-users">Laporan Data User</a>
                        <a class="collapse-item" href="index.php?include=laporan-data-booking">Laporan Data Booking</a>
                        <a class="collapse-item" href="index.php?include=laporan-data-peminjaman">Laporan Data Peminjaman</a>
                        <a class="collapse-item" href="index.php?include=laporan-data-pengembalian">Laporan Data Pengembalian</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan User
            </div>
            
            <!-- Nav Item - Data Peminjaman -->
            <li class="nav-item mb-3">
                <a class="nav-link pb-0" href="index.php?include=users">
                <i class="fas fa-fw fa fa-users"></i>
                    <span>Pengaturan User</span>
                </a>
            </li>
        <?php elseif($_SESSION['id_role'] == 2) : ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu User
            </div>
            
            <!-- Nav Item - Data Peminjaman -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="index.php?include=peminjaman-buku-users">
                <i class="fas fa-fw fa-solid fa-book"></i>
                    <span>Data Peminjaman</span>
                </a>
            </li>

            <!-- Nav Item - Booking Buku -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="index.php?include=booking-buku">
                    <i class="fas fa-fw fa-sharp fa-solid fa-barcode"></i>
                    <span>Booking Buku</span>
                </a>
            </li>

            <!-- Nav Item - Ulasan -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="index.php?include=ulasan">
                    <i class="fas fa-fw fa-comment-alt"></i>
                    <span>Ulasan</span>
                </a>
            </li>

            <!-- Nav Item - Cetak Kartu Anggota -->
            <li class="nav-item mb-3">
                <a class="nav-link pb-0" href="index.php?include=cetak-kartu-anggota">
                    <i class="fas fa-fw fa-sharp fa-solid fa-clipboard"></i>
                    <span>Cetak Kartu Anggota</span>
                </a>
            </li>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>
    
    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="index.php?include=profil">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span>
        </a>
    </li>

    <!-- Nav Item - Change Password -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="index.php?include=ubah-password">
            <i class="fas fa-fw fa-solid fa-key"></i>
            <span>Ubah Password</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3 my-0">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->