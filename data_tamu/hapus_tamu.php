<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$id_tamu = $_POST['idT'];

$querydelete=mysqli_query($koneksi, "delete from tbl_buku_tamu where id_tamu = '$id_tamu'");

if($querydelete){
	echo '<script>alert("Data Anda Berhasil dihapus!");document.location="../beranda.php";</script>';
}else{
	echo "Error, data gagal dihapus".mysqli_error($koneksi);
}

?> 