<?php
if (!defined('__NOT_DIRECT')) {
    //mencegah akses langsung ke file ini
    die('Akses langsung tidak diizinkan!');
}

session_start();

define('BASE_URL', '/revilm-klp1-uas/');



require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db/koneksi.php';

if (!isset($_SESSION['login'])) {
    //user belum login
    $__tipe_user = 'Guest';
} else {
    $__tipe_user = $_SESSION['role'];
    $__nama_user = $_SESSION['nama_user'];
}

$aksesFilename = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'akses' . DIRECTORY_SEPARATOR . $__tipe_user . '.php';
if (!file_exists($aksesFilename)) {
    die('Terjadi kesalahan sistem');
}

$__akses_config = include $aksesFilename;
$arrayCurrentPath = explode('?', $_SERVER['REQUEST_URI']);
$currentPath = substr($arrayCurrentPath[0], strlen(BASE_URL));

$allow = in_array($currentPath, $__akses_config);

if (!$allow) {
    if ($__tipe_user == 'Guest' && $currentPath != 'index.php') {
        header("Location: " . BASE_URL . 'index.php');
    } else {
        echo "Anda tidak diizinkan mengakses halaman ini!";
        echo "status : " . $__tipe_user;
        echo " || role vardump : ";
        var_dump($_SESSION['role']);
    }
    exit;
}
