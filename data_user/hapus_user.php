<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$id_user = $_POST['idU'];

$querydelete=mysqli_query($koneksi, "delete from tbl_user where id_user = '$id_user'");

if($querydelete){
	echo '<script>alert("Data Berhasil dihapus!");document.location="../beranda.php";</script>';
}else{
	echo "Error, data gagal dihapus".mysqli_error($koneksi);
}

?>