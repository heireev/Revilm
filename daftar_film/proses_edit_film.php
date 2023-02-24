<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../db/koneksi.php';

$id_film = $_POST['id_film'];
$nama_film = $_POST['nama_film'];
$link_trailer = $_POST['link_trailer'];
$sinopsis = $_POST['sinopsis'];
$pemain_utama = $_POST['pemain_utama'];
$director = $_POST['director'];
$penulis = $_POST['penulis'];
$durasi = $_POST['durasi'];
$genre = $_POST['genre'];
$sampul_film = $_FILES['sampul_film']['name']; 
$sampul_film_old = $_POST["sampul_film_old"];


//cek dulu jika merubah gambar produk jalankan coding ini
if ($sampul_film != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $sampul_film); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['sampul_film']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $sampul_film; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query = "UPDATE daftar_film SET nama_film = '$nama_film', link_trailer = '$link_trailer', sinopsis = '$sinopsis', pemain_utama = '$pemain_utama', director = '$director', penulis = '$penulis', durasi = '$durasi', genre = '$genre', sampul_film = '$nama_gambar_baru'";
        $query .= "WHERE id_film = '$id_film'";
        $result = mysqli_query($koneksi, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        } else {
            // menghapus pic file lama
            unlink($sampul_film_old);
            
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('X Data berhasil diubah.');window.location='../beranda.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../beranda.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query = "UPDATE daftar_film SET nama_film = '$nama_film', link_trailer = '$link_trailer', sinopsis = '$sinopsis', pemain_utama = '$pemain_utama', director = '$director', penulis = '$penulis', durasi = '$durasi', genre = '$genre'";
    $query .= "WHERE id_film = '$id_film'";
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('[tanpa gambar] Data berhasil diubah.');window.location='../beranda.php';</script>";
    }
}


?>