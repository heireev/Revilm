<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$nama_user = $_POST['namaU'];
$email_user = $_POST['emailU'];
$role = $_POST['roleU'];
$pass_user = $_POST['passU'];

$hasil=mysqli_query($koneksi, "insert into tbl_user values ('','$nama_user','$email_user','$role','$pass_user')");

echo '<script> alert("Data Anda Berhasil disimpan!");document.location="../beranda.php";</script>';


?>