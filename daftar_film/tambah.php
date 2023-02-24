<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include '../cek_akses.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        h1 {
            text-transform: uppercase;
            color: salmon;
        }

        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
            border: 0px;
            margin-top: 20px;
        }

        label {
            margin-top: 10px;
            float: left;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }

        div {
            width: 100%;
            height: auto;
        }

        .base {
            width: 400px;
            height: auto;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background: #ededed;
        }
    </style>
</head>

<body>
    <h4 align="center"><a href="../beranda.php">Lihat Semua Data</a></h4>
    <br />
    <h3 align="center">Input data baru</h3>
    <form action="proses_input.php" method="post" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>Nama Film</label>
                <input type="text" name="nama_film" required>
            </div>
            <div>
                <label>Link Trailer</label>
                <img src="../assets/img/yt-code.png"
                            style="width: 97%;float: left;margin-bottom: 5px;">
                <input type="text" name="link_trailer" required>
            </div>
            <div>
                <label>Sinposis</label>
                <input type="text" name="sinopsis" required>

            </div>
            <div>
                <label>Pemain Utama</label>
                <input type="text" name="pemain_utama" required>
            </div>
            <div>
                <label>Director</label>
                <input type="text" name="director" required>
            </div>
            <div>
                <label>Penulis</label>
                <input type="text" name="penulis" required>
            </div>
            <div>
                <label>Durasi</label>
                <input type="text" name="durasi" required>
            </div>
            <div>
                <label>Genre</label>
                <input type="text" name="genre" required>
            </div>
            <div>
                <label>Upload Sampul</label>
                <input type="file" name="sampul_film">
            </div>
            <div>
                <button type="submit">Simpan Film</button>
            </div>
        </section>
    </form>

</html>