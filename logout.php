<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'cek_akses.php';
?>

<?php 
session_start();

unset($_SESSION['role']);
unset($_SESSION['nama_user']);
unset($_SESSION['my_user_agent']);
	
session_regenerate_id();
session_destroy();

echo '<script>document.location="index.php?berhasilKeluar";</script>';
