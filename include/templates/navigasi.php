<!-- navbar -->
<nav class="navbar sticky-top fixed-top navbar-expand-lg nav-bg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="dist/img/uLibrary-logo.png" alt="uLibrary" class="logo-ulibrary">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            if (isset($_GET["include"])) {
                
                $include = $_GET["include"];
            }
        ?>
        <div class="collapse navbar-collapse nav-list" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php if(empty($include)) : ?>
                    <a class="nav-link" aria-current="page" href="index.php" style="color: #FF8500;">Beranda</a>
                    <?php else : ?>
                    <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <?php if($include == "tentang") : ?>
                    <a class="nav-link" href="index.php?include=tentang" style="color: #FF8500;">Tentang</a>
                    <?php else : ?>
                    <a class="nav-link" href="index.php?include=tentang">Tentang</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item dropdown">
                    <?php if($include == "kategori-buku") : ?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #FF8500;">
                        Kategori Buku
                    </a>
                    <?php else : ?>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori Buku
                    </a>
                    <?php endif; ?>
                    <ul class="dropdown-menu">
                        <?php 

                            $sql = "SELECT `id_kategori_buku`, `kategori_buku`
                                FROM `kategori_buku` 
                                ORDER BY `id_kategori_buku`";

                            $query = mysqli_query($koneksi, $sql);

                        ?>

                        <?php while ($data = mysqli_fetch_assoc($query)) :
                            $id_kategori_buku = $data["id_kategori_buku"];
                            $kategori_buku = $data["kategori_buku"];
                        ?>
                        <li>
                            <a class="dropdown-item" href="index.php?include=kategori-buku&data=<?= $id_kategori_buku; ?>"><?= $kategori_buku; ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <?php if($include == "team") : ?>
                    <a class="nav-link" href="index.php?include=team" style="color: #FF8500;">Team</a>
                    <?php else : ?>
                    <a class="nav-link" href="index.php?include=team">Team</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a href="admin/" class="btn btn-secondary btn-sign-in" type="button">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>