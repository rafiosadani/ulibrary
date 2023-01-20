<!-- slider -->
<section id="slider">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="dist/img/slider/hero1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="dist/img/slider/hero2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="dist/img/slider/hero3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- ketegori buku -->
<section id="kategori-buku">
    <div class="container">
        <div class="row text-center">
            <h2>Kategori Buku</h2>
            <!-- <div class="col-lg-12"> -->
                <div class="row mx-auto justify-content-center mt-2">
                    <?php 

                        $sql = "SELECT `id_kategori_buku`, `kategori_buku`, `gambar`
                                FROM `kategori_buku` 
                                ORDER BY `id_kategori_buku`";

                        $query = mysqli_query($koneksi, $sql);

                    ?>

                    <?php while ($data = mysqli_fetch_assoc($query)) :
                        $id_kategori_buku = $data["id_kategori_buku"];
                        $kategori_buku = $data["kategori_buku"];
                        $gambar = $data["gambar"];
                    ?>
                    <div class="col-4 col-md-2 mt-4">
                        <div class="kotak m-auto">
                            <div class="bungkus-icon">
                                <a href="index.php?include=kategori-buku&data=<?= $id_kategori_buku; ?>"><img src="dist/img/kategori-buku/<?= $gambar; ?>" alt="<?= $kategori_buku; ?>"></a>
                            </div>
                            <a href="index.php?include=kategori-buku"><p class=""><?= $kategori_buku; ?></p></a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <!-- </div> -->
        </div>
    </div>
</section>

<!-- after-kategori-buku -->
<section id="after-kategori-buku">
    <div class="container">
        <div class="col-12">
            <p>"Libraries answer questions you didn't <br>even know you had!"</p>
        </div>
    </div>
</section>

<!-- populer -->
<section id="populer">
    <div class="container">
        <div class="row">
            <h2 class="text-center">Populer</h2>
            <?php 

                $sql = "SELECT MAX(`detail_peminjaman`.`jumlah_buku`) as `jmlBuku`, `buku`.`id_buku`,
                                `buku`.`judul`, `buku`.`pengarang`, `buku`.`gambar`
                        FROM `buku`
                        INNER JOIN `detail_peminjaman` ON `buku`.`id_buku` = `detail_peminjaman`.`id_buku`
                        GROUP BY `detail_peminjaman`.`id_buku` 
                        ORDER BY `jmlBuku` DESC LIMIT 3";

                $query = mysqli_query($koneksi, $sql);

            ?>

            <?php while ($data = mysqli_fetch_assoc($query)) :
                $id_buku = $data["id_buku"];
                $judul = $data["judul"];
                $pengarang = $data["pengarang"];
                $gambar = $data["gambar"];
            ?>
            <div class="col-md-4 mt-4 card-buku">
                <div class="card m-auto" style="width: 240px; height: 500px;">
                    <img src="dist/img/buku/<?= $gambar; ?>" class="card-img-top img-size" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $judul; ?></h5>
                        <p class="card-text"><?= $pengarang; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="detail">
                                <a href="index.php?include=detail-buku&data=<?= $id_buku; ?>" class="badge rounded-pill">
                                    <span>Detail</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endwhile; ?>
            <div class="col-md-12 mt-5 text-center">
                <a href="index.php?include=populer" class="btn btn-danger shadow" style="border-radius: 40px;">Lihat lebih banyak</a>
            </div>
        </div>
    </div>
</section>

<hr>

<!-- buku terbaru -->
<section id="buku-terbaru">
    <div class="container">
        <div class="row my-2">
            <h2 class="text-center">Buku Terbaru</h2>
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner p-4">
                    <div class="carousel-item active">
                        <div class="col-md-9 m-auto">
                            <div class="row">
                                <?php 

                                    $sql = "SELECT `id_buku`, `judul`, `pengarang`, `gambar`
                                            FROM `buku` 
                                            ORDER BY `id_buku` DESC LIMIT 3";

                                    $query = mysqli_query($koneksi, $sql);

                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_buku = $data["id_buku"];
                                    $judul = $data["judul"];
                                    $pengarang = $data["pengarang"];
                                    $gambar = $data["gambar"];
                                ?>
                                <div class="col-md-4 mt-4 m-auto card-buku">
                                    <div class="card m-auto" style="width: 240px; height: 500px;">
                                        <img src="dist/img/buku/<?= $gambar; ?>" class="card-img-top img-size" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $judul; ?></h5>
                                            <p class="card-text"><?= $pengarang; ?></p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="detail">
                                                    <a href="index.php?include=detail-buku&data=<?= $id_buku; ?>" class="badge rounded-pill">
                                                        <span>Detail</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-9 m-auto">
                            <div class="row">
                                <?php 

                                    $sql = "SELECT `id_buku`, `judul`, `pengarang`, `gambar`
                                            FROM `buku` 
                                            ORDER BY `id_buku` DESC LIMIT 3,3";

                                    $query = mysqli_query($koneksi, $sql);

                                ?>

                                <?php while ($data = mysqli_fetch_assoc($query)) :
                                    $id_buku = $data["id_buku"];
                                    $judul = $data["judul"];
                                    $pengarang = $data["pengarang"];
                                    $gambar = $data["gambar"];
                                ?>
                                    <div class="col-md-4 mt-4 m-auto card-buku">
                                        <div class="card m-auto" style="width: 240px; height: 500px;">
                                            <img src="dist/img/buku/<?= $gambar; ?>" class="card-img-top img-size" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $judul; ?></h5>
                                                <p class="card-text"><?= $pengarang; ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="detail">
                                                        <a href="index.php?include=detail-buku&data=<?= $id_buku; ?>" class="badge rounded-pill">
                                                            <span>Detail</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>