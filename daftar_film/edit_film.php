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
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: salmon;
        }

        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }

        div {
            width: 100%;
            height: auto;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background: #ededed;
        }
    </style>
</head>

<body>
    <center>
        <h1>Edit Film
            <?php echo $data['nama_film']; ?>
        </h1>
        <center>
            <form method="POST" action="proses_edit_film.php" enctype="multipart/form-data">
                <section class="base">
                    <input name="id_film" value="<?php echo $data['id_film']; ?>" hidden />
                    <div>
                        <label>Nama Film</label>
                        <input type="text" name="nama_film" value="<?php echo $data['nama_film']; ?>">
                    </div>
                    <div>
                        <label>Link Trailer</label>
                        <input type="text" name="link_trailer" value="<?php echo $data['link_trailer']; ?>">
                    </div>
                    <div>
                        <label>Sinposis</label>
                        <input type="text" name="sinopsis" value="<?php echo $data['sinopsis']; ?>">

                    </div>
                    <div>
                        <label>Pemain Utama</label>
                        <input type="text" name="pemain_utama" value="<?php echo $data['pemain_utama']; ?>">
                    </div>
                    <div>
                        <label>Director</label>
                        <input type="text" name="director" value="<?php echo $data['director']; ?>">
                    </div>
                    <div>
                        <label>Penulis</label>
                        <input type="text" name="penulis" value="<?php echo $data['penulis']; ?>">
                    </div>
                    <div>
                        <label>Durasi</label>
                        <input type="text" name="durasi" value="<?php echo $data['durasi']; ?>">
                    </div>
                    <div>
                        <label>Genre</label>
                        <input type="text" name="genre" value="<?php echo $data['genre']; ?>">
                    </div>
                    <div>
                        <label>Upload Sampul</label>
                        <img src="../assets/img/<?php echo $data['sampul_film']; ?>"
                            style="width: 120px;float: left;margin-bottom: 5px;">
                            <input type="hidden" name="sampul_film_old" value="../assets/img/<?php echo $data['sampul_film']; ?>">
                        <input type="file" name="sampul_film" />
                        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                    <div>
                        <button type="submit">Simpan Perubahan</button>
                    </div>
                </section>
            </form>
</body>

</html>