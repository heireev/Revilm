<?php
defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
include 'cek_akses.php';
?>

<div class="container-fluid pt-3">
    <div class="card my-card">
        <div class="card-header">
            <h2 class="card-title">
                <b>
                    <center>Settings</center>
                </b>
            </h2>
        </div>
        <div class="card-body my-2">
            <div class="row">
                <div class="col-md-2">
                    <div class="row row-cols-1 gap-2 p-3">
                        <div class="col menu_settings btn btn-outline-primary" id="stg_anggota_view">
                            DATA ANGGOTA</div>
                        <div class="col menu_settings btn btn-outline-primary" id="stg_anggota_crud">CRUD ANGGOTA</div>
                        <div class="col menu_settings btn btn-outline-primary " id="stg_tamu_crud">CRUD TAMU</div>
                        <div class="col menu_settings btn btn-outline-primary " id="stg_film_crud">CRUD FILM</div>
                        <div class="col menu_settings btn btn-primary text-light btn-outline-primary" id="stg_about_us">ABOUT US</div>
                    </div>
                </div>
                <div class="col">
                    <div id="contentSettings">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .my-card {
        min-height: 800px;
    }
</style>

<script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/jquery-3.6.1.min.js"></script>
	<script src="assets/js/datatables.js"></script>

<script>
    $(document).ready(function () {
        $('#contentSettings').load('aboutUs.php');
    });

    $('.menu_settings').click(function (e) {
        e.preventDefault();

        var menu = $(this).attr('id');
        if (menu == "stg_anggota_view") {
            $('.btn-outline-primary').removeClass('btn-primary');
            $('.btn-outline-primary').removeClass('text-light');
            $(this).addClass('btn-primary');
            $(this).addClass('text-light');
            $('#contentSettings').load('data_user/lihat_user.php');
        } else if (menu == "stg_anggota_crud") {
            $('.btn-outline-primary').removeClass('btn-primary');
            $('.btn-outline-primary').removeClass('text-light');
            $(this).addClass('btn-primary');
            $(this).addClass('text-light');
            $('#contentSettings').load('data_user/crud_user.php');
        } else if (menu == "stg_tamu_crud") {
            $('.btn-outline-primary').removeClass('btn-primary');
            $('.btn-outline-primary').removeClass('text-light');
            $(this).addClass('btn-primary');
            $(this).addClass('text-light');
            $('#contentSettings').load('data_tamu/crud_tamu.php');
        } else if (menu == "stg_film_crud") {
            $('.btn-outline-primary').removeClass('btn-primary');
            $('.btn-outline-primary').removeClass('text-light');
            $(this).addClass('btn-primary');
            $(this).addClass('text-light');
            $('#contentSettings').load('daftar_film/crud_film.php');
        } else if (menu == "stg_about_us") {
            $('.btn-outline-primary').removeClass('btn-primary');
            $('.btn-outline-primary').removeClass('text-light');
            $(this).addClass('btn-primary');
            $(this).addClass('text-light');
            $('#contentSettings').load('aboutUs.php');
        }
    });
</script>