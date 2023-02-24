<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$id_user = $_POST['idU'];
$nama_user = $_POST['namaU'];
$email_user = $_POST['emailU'];
$role = $_POST['roleU'];
$pass_user = $_POST['passU'];

$queryupdate=mysqli_query($koneksi, "update tbl_user set nama_user = '$nama_user', email_user = '$email_user', role = '$role', pass_user = '$pass_user' where id_user = '$id_user'");

if($queryupdate){
	echo '<script>alert("Data Anda Berhasil diedit!");document.location="../beranda.php";</script>';
}else{
	echo "Error, data gagal dihapus".mysqli_error($koneksi);
}

?>