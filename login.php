<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'cek_akses.php';
?>

<!-- Otentikasi Login -->
<?php

if (isset($_POST)) {
    include "db/koneksi.php";

    $user = mysqli_real_escape_string($koneksi, htmlentities($_POST['namaU']));
    $pass = mysqli_real_escape_string($koneksi, htmlentities($_POST['passU']));
    $role = mysqli_real_escape_string($koneksi, htmlentities($_POST['roleU']));

    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE nama_user='$user' and role='$role' and pass_user='$pass'");
    if (mysqli_num_rows($sql) == 0) {
        echo '<script>confirm("username/password/role tidak sesuai!");</script>';
        echo '<a href="index.php">kembali</a>';
    } else {
        $row = mysqli_fetch_assoc($sql);
        if ($row['role'] == "Admin") {
            $_SESSION['role'] = 'Admin';
            $_SESSION['nama_user'] = $user;
            $_SESSION['login'] = true;
            echo '<script>document.location="beranda.php?berhasilMasukAdmin";</script>';
            // header("Location: beranda.php");
        } else if ($row['role'] == "Anggota") {
            $_SESSION['role'] = 'Anggota';
            $_SESSION['nama_user'] = $user;
            $_SESSION['login'] = true;
            echo '<script>document.location="beranda.php?berhasilMasukAnggota";</script>';
            // header("Location: beranda.php");
        }
    }
}
?>