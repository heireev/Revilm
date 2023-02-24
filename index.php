<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="assets/my/style.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="css/datatables.css">


    <title>REVILM</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="assets/img/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                Revilm
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link menu active" id="menuFilm" href="#">Daftar
                            Film</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu" id="menuTamu" href="#">Buku Tamu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu" id="menuAbtUS" href="#">aboutUs</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-outline-danger border-0" data-bs-toggle="modal" data-bs-target="#ModalLogin">
                            <iconify-icon icon="heroicons-outline:login" style="color: white;" width="30" height="30"></iconify-icon>
                        </button>
                    </li>

                    <!--Modal Login-->
                    <div class="modal fade" id="ModalLogin">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Login Revilm</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Form Login -->
                                <form action="login.php" method="post" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="namaU" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="passU" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Login sebagai</label>
                                            <select class="form-control" name="roleU">
                                                <option value="" selected> - Pilih Status - </option>
                                                <option value="Admin">Admin</option>
                                                <option value="Anggota">Anggota</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                                        <button type="button" name="batal" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>

                                    <div class="modal-footer">
                                        <span>Belum punya akun? silahkan
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#ModalRegister">Mendaftar Anggota</a>
                                            atau
                                            <a href="#" data-bs-dismiss="modal">Tetap Login Sebagai Guest</a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Modal Regsister-->
                    <div class="modal fade" id="ModalRegister">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Registrasi User</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="data_user/simpan_user.php" method="post" role="form">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="namaU" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="emailU" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Registrasi sebagai</label>
                                            <select class="form-control" name="roleU">
                                                <option value="" selected> - Pilih Status - </option>
                                                <option value="Anggota">Anggota</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tentukan Password</label>
                                            <input type="password" name="passU" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                                        <button type="button" name="batal" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <div id="content">
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h4>made by - Kelompok 1</h4>
                </div>
            </div>
        </div>
    </footer>
    <!-- AKHIR FOOTER -->

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/jquery-3.6.1.min.js"></script>
    <script src="assets/js/datatables.js"></script>

    <!-- load script -->
    <script>
        $(document).ready(function() {
            $('#content').load('daftar_film/daftarFilm-guest.php');
        });

        $('.menu').click(function(e) {
            e.preventDefault();

            var menu = $(this).attr('id');
            if (menu == "menuFilm") {
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
                $('#content').load('daftar_film/daftarFilm-guest.php');
            } else if (menu == "menuTamu") {
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
                $('#content').load('data_tamu/lihat_tamu-guest.php');
            } else if (menu == "menuAbtUS") {
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
                $('#content').load('aboutUs.php');
            }
        });
    </script>

    <!-- Script iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
</body>

</html>