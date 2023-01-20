<body class="bg-gradient-secondary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg" style="margin: 48px auto;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background-image: url('assets/img/login/bg.png'); background-size: cover; padding: 244px 0;">
                        <div class="logo text-center">
                            <img src="assets/img/login/uLibrary-logo.png" alt="uLibrary Logo" style="width: 300px;">
                        </div>
                    </div>
                    <div class="col-lg-7" style="padding: 54px 0;">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 mb-4" style="color: #3C096C; font-size: 32px;">Create an Account!</h1>
                            </div>
                            <?php if (!empty($_GET['notif'])) : ?>
                                <?php if ($_GET['notif'] == "namaKosong") : ?>
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        Maaf nama tidak boleh kosong
                                    </div>
                                <?php elseif ($_GET['notif'] == "usernameKosong") : ?>
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        Maaf username tidak boleh kosong
                                    </div>
                                <?php elseif ($_GET['notif'] == "passwordKosong") : ?>
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        Maaf password tidak boleh kosong
                                    </div>
                                <?php elseif ($_GET['notif'] == "konfirmasiPasswordKosong") : ?>
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        Maaf konfirmasi password tidak boleh kosong
                                    </div>
                                <?php elseif ($_GET['notif'] == "konfirmasiPasswordTidakSama") : ?>
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        Maaf konfirmasi password tidak sama
                                    </div>
                                <?php elseif ($_GET['notif'] == "usernameSudahAda") : ?>
                                    <div class="alert alert-danger" style="font-size: 14px;">
                                        Maaf username sudah digunakan!, Gunakan username yang lain.
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <form class="user" action="index.php?include=konfirmasi-register" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" placeholder="Name" name="nama" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" placeholder="Username" name="username" autocomplete="off">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="konfirmasiPassword">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block" style="background-color: #FF8500; color: #F4F4F4; font-size: 14px; border: 1px solid #FF8500;">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="index.php" style="color: #3C096C; text-decoration: none;">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php if (!empty($_GET['notif'])) : ?>
        <?php if ($_GET['notif'] == "namaKosong") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf nama tidak boleh kosong!'
                })
            </script>
        <?php elseif ($_GET['notif'] == "usernameKosong") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf username tidak boleh kosong!'
                })
            </script>
        <?php elseif ($_GET['notif'] == "passwordKosong") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf password tidak boleh kosong!'
                })
            </script>
        <?php elseif ($_GET['notif'] == "konfirmasiPasswordKosong") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf konfirmasi password tidak boleh kosong!'
                })
            </script>
        <?php elseif ($_GET['notif'] == "konfirmasiPasswordTidakSama") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf konfirmasi password tidak sama!'
                })
            </script>
        <?php elseif ($_GET['notif'] == "usernameSudahAda") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf username sudah digunakan!, Gunakan username yang lain.'
                })
            </script>
        <?php endif; ?>
    <?php endif; ?>
<!-- </body> -->