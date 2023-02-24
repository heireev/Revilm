<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="card-title"><b>
                <center>Data Film (@AnggotaRevilm)</center>
            </b></h2>
    </div>

    <div class="card-body">
        <a href="daftar_film/tambah.php">
            <button type="button" class="btn btn-outline-primary"><b>Tambah Film</b></button>
        </a>
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
                                    <a href="daftar_film/detail_film.php?id_film=<?php echo $a['id_film']; ?>" class='btn btn-primary'>Lihat Detail</a>
                                </div>
                                <!-- Edit btn -->
                                <div class="p-2 bd-highlight">
                                    <a href="daftar_film/edit_film.php?id_film=<?php echo $a['id_film']; ?>" class="btn btn-success p-1">
                                        <iconify-icon icon="material-symbols:edit" style="color: white;" width="30">
                                        </iconify-icon>
                                    </a>
                                </div>

                                <!-- Hapus btn -->
                                <div class="p-2 bd-highlight">
                                    <button type="button" name="hapus" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#HapusFilm<?php echo $a['id_film']; ?>">
                                        <iconify-icon icon="ic:round-delete" style="color: white;" width="30">
                                        </iconify-icon>
                                    </button>
                                </div>

                                <!--Modal hapus-->
                                <div class="modal fade" id="HapusFilm<?php echo $a['id_film']; ?>">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content text-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Film</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="daftar_film/hapus_film.php" method="post" role="form">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_film" class="form-control" value="<?php echo $a['id_film']; ?>">
                                                    <input type="hidden" name="sampul_film" class="form-control" value="<?php echo $a['sampul_film']; ?>">
                                                    <center>
                                                        <h4>Yakin data ini akan dihapus?</h4>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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

    <div class="card-footer text-muted">
        <center><i>Revilm</i></center>
    </div>
</div>