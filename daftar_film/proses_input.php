<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$nama_film = $_POST['nama_film'];
$link_trailer = $_POST['link_trailer'];
$sinopsis = $_POST['sinopsis']; 
$pemain_utama = $_POST['pemain_utama'];
$director = $_POST['director'];
$penulis = $_POST['penulis'];
$durasi = $_POST['durasi'];
$genre = $_POST['genre'];
$sampul_film = $_FILES['sampul_film']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if ($sampul_film != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi yg bisa diupload 
    $x = explode('.', $sampul_film); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['sampul_film']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $sampul_film; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
        $query = "INSERT INTO daftar_film (nama_film,link_trailer,sinopsis,pemain_utama,director,penulis,durasi,genre,sampul_film) VALUES ('$nama_film','$link_trailer','$sinopsis','$pemain_utama','$director','$penulis','$durasi','$genre','$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambah.');window.location='../beranda.php';</script>";
        }

    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
    }
} else {
    $query = "INSERT INTO daftar_film (nama_film,link_trailer,sinopsis,pemain_utama,director,penulis,durasi,genre) VALUES ('$nama_film','$link_trailer','$sinopsis','$pemain_utama','$director','$penulis','$durasi','$genre')";
        $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('[tanpa gambar] Data berhasil ditambah');window.location='../beranda.php';</script>";
    }
}


?>