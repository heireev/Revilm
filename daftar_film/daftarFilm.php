<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT',1);
include '../cek_akses.php'; 
?>

<!-- JUMBOTRON -->
<div class="title p-4">
    <div class="container text-center">
        <img src="assets/img/logo2.png" alt="Logo" width="100" height="100">
        <h1 class="display-4 fw-bold text-primary">Revilm</h1>
        <p class="lead">Kaji ulasan-ulasan menarik
            terkait film-film terbaik beraneka genre yang harus anda saksikan di waktu senggang Anda.</p>
        <hr class="my-4">
    </div>
</div>
<!-- AKHIR JUMBOTRON -->

<!-- CARD -->
<div class="film">
    <div class="container">
        <br><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            include '../db/koneksi.php';
            $sql = "select * from daftar_film order by id_film";
            $qry = mysqli_query($koneksi, $sql);

            while ($a = mysqli_fetch_array($qry)) {
            ?>
            <div class='col'>
                <div class='card shadow text-white bg-dark mb-3'>
                    <img src='assets/img/<?php
                if ($a['sampul_film'] != "") {
                    echo $a['sampul_film'];
                } else {
                    echo "00-default.jpg";
                }
                    ?>' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>
                            <?php echo $a['nama_film']; ?>
                        </h5>
                        <p class='card-text'>Genre:
                            <?php echo $a['genre']; ?>
                        </p>
                        <div class="d-flex bd-highlight">
                            <div class="me-auto p-2 bd-highlight">
                                <a href="daftar_film/detail_film.php?id_film=<?php echo $a['id_film']; ?>"
                                    class='btn btn-primary'>Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
        </div>

        <div class="row">
            <div class="col">
                <hr class="my-4">
            </div>
        </div>
    </div>
</div>
<!-- AKHIR CARD -->