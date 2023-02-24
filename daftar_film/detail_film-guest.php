<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';

// mengecek apakah di url ada nilai GET id_film
if (isset($_GET['id_film'])) {
    // ambil nilai id_film dari url dan disimpan dalam variabel $id_film
    $id_film = ($_GET["id_film"]);

    // menampilkan data dari database yang mempunyai id_film=$id_film
    $query = "SELECT * FROM daftar_film WHERE id_film='$id_film'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='../beranda.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='../beranda.php';</script>";
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <title>REVILM</title>
</head>

<body>
    <!-- JUMBOTRON -->
    <section class="film">
        <div class="container">
            <div class="row">
                <div class="col p-4">
                    <a class="btn btn-success" href="../index.php" role="button">Kembali</a>
                </div>
            </div>

            <div class="row">
                <div class="col-auto mx-auto text-center w-100">
                    <img src="../assets/img/<?php echo $data['sampul_film']; ?>" class="img-thumbnail w-25" alt="">
                    <!-- <p><a href="#perbesar">perbesar gambar</a></p> -->

                    <div class="overlay" id="perbesar">
                        <img src="../DaftarFilm/img/1. Parasite.JPG" class="figure-img my-0 p-5 mx-0 w-auto" alt="">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <h1 class="display-4">
                        <?php echo $data['nama_film']; ?>
                    </h1>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr class="my-4">
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="emboss rounded my-4">
                        <div class="video">
                            <iframe width="100%" height="620" src="https://www.youtube.com/embed/<?php echo $data['link_trailer']; ?>?autoplay=0;rel=0;showinfo=0;controls=0" frameborder="0" allow="autoplay; encrypted-media" style="border: 1px solid #cccccc"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr class="my-4">
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <h1 class="display-4">
                        <?php echo $data['nama_film']; ?>
                    </h1>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr class="my-4">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card text-light bg-dark p-5">
                        <h2>Sinopsis</h2>
                        <p class="lead" align="justify">
                            <?php echo $data['sinopsis']; ?>
                        </p>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr class="my-4">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card text-light bg-dark p-5">
                        <p class="lead">
                            Pemain Utama :
                            <?php echo $data['pemain_utama']; ?> <br>
                            Director :
                            <?php echo $data['director']; ?> <br>
                            Penulis :
                            <?php echo $data['penulis']; ?> <br>
                            Durasi:
                            <?php echo $data['durasi']; ?> <br>
                            Genre :
                            <?php echo $data['genre']; ?> <br>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <hr class="my-4">
                </div>
            </div>

            <div class="row">
                <div class="col p-4">
                    <a class="btn btn-success" href="../index.php" role="button">Kembali</a>
                </div>
            </div>

        </div>

        </div>
    </section>
    <!-- AKHIR JUMBOTRON -->



    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../script.js"></script>
</body>

</html>