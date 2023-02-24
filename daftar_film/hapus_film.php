<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$id_film = $_POST["id_film"];
$sampul_film = $_POST["sampul_film"];
//mengambil id yang ingin dihapus

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM daftar_film WHERE id_film='$id_film' ";
$hasil_query = mysqli_query($koneksi, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
  die("Gagal menghapus data: " . mysqli_errno($koneksi) .
    " - " . mysqli_error($koneksi));
} else {
  unlink('../assets/img/'.$sampul_film);
  echo "<script>alert('Data berhasil dihapus.');window.location='../beranda.php';</script>";
}


?>