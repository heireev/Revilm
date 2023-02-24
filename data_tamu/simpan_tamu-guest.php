<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
include '../db/koneksi.php';
$nama_tamu = $_POST['namaT'];
$email_tamu = $_POST['emailT'];
$asal_tamu = $_POST['asalT'];
$kesan_pesan = $_POST['kepesT'];

$hasil = mysqli_query($koneksi, "insert into tbl_buku_tamu values ('','$nama_tamu','$email_tamu','$asal_tamu','$kesan_pesan')");


echo '<script>alert("Data Anda Berhasil disimpan!");document.location="../index.php";</script>';

?>