<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$id_tamu = $_POST['idT'];
$nama_tamu = $_POST['namaT'];
$email_tamu = $_POST['emailT'];
$asal_tamu = $_POST['asalT'];
$kesan_pesan = $_POST['kepesT'];

$queryupdate=mysqli_query($koneksi, "update tbl_buku_tamu set nama_tamu = '$nama_tamu', email_tamu = '$email_tamu', asal_tamu = '$asal_tamu', kesan_pesan = '$kesan_pesan' where id_tamu = '$id_tamu'");

if($queryupdate){
	echo '<script>alert("Data Anda Berhasil diedit!");document.location="../beranda.php";</script>';
}else{
	echo "Error, data gagal dihapus".mysqli_error($koneksi);
}

?> 