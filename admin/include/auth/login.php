<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg" style="margin: 48px auto;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('assets/img/login/bg.png'); background-size: cover; padding: 244px 0;">
                                <div class="logo text-center">
                                    <img src="assets/img/login/uLibrary-logo.png" alt="uLibrary Logo" style="width: 300px;">
                                </div>
                            </div>
                            <div class="col-lg-6" style="padding: 80px 0;">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4" style="color: #3C096C; font-size: 32px;">Sign In</h1>
                                    </div>
                                    <?php if (!empty($_GET['notif'])) : ?>
                                        <?php if ($_GET['notif'] == "usernameKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Maaf username tidak boleh kosong
                                            </div>
                                        <?php elseif ($_GET['notif'] == "passwordKosong") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px;">
                                                Maaf password tidak boleh kosong
                                            </div>
                                        <?php elseif ($_GET['notif'] == "loginUlang") : ?>
                                            <div class="alert alert-success" style="font-size: 14px;">
                                                Password berhasil diedit! Silahkan login kembali
                                            </div>
                                        <?php elseif ($_GET['notif'] == "registerBerhasil") : ?>
                                            <div class="alert alert-success" style="font-size: 14px;">
                                                Register Account berhasil dilakukan!, silahkan login untuk masuk ke dalam aplikasi.
                                            </div>
                                        <?php elseif ($_GET['notif'] == "userpassSalah") : ?>
                                            <div class="alert alert-danger" style="font-size: 14px; text-align: justify;">
                                                Maaf username atau password salah
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <form class="user" action="index.php?include=konfirmasi-login" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Username" name="username" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Password" name="password" autocomplete="off">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-user btn-block" style="background-color: #FF8500; color: #F4F4F4; font-size: 14px; border: 1px solid #FF8500;">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.php?include=register" style="color: #3C096C; text-decoration: none;">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php if (!empty($_GET['notif'])) : ?>
        <?php if ($_GET['notif'] == "usernameKosong") : ?>
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
        <?php elseif ($_GET['notif'] == "loginUlang") : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Password berhasil diedit! silahkan login kembali'
                })
            </script>
        <?php elseif ($_GET['notif'] == "registerBerhasil") : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: 'Register Account berhasil dilakukan!, silahkan login untuk masuk ke dalam aplikasi.'
                })
            </script>
        <?php elseif ($_GET['notif'] == "userpassSalah") : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: 'Maaf username atau password salah!'
                })
            </script>
        <?php endif; ?>
    <?php endif; ?>
<!-- </body> -->