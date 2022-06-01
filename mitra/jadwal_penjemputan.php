<?php
require '../connect_db.php';
require '../session_data.php';
/* =========================================================== */
//pastikan hanya pemasok yg boleh akses halaman ini
if ($level !== '2') {
    header("location:../index.php");
}
/* =========================================================== */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Description Web -->
    <meta name="keywords" content="kamibox">
    <meta name="description" content="">
    <meta name="author" content="Agung Dwi Sahputra">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <title>Jadwal Penjemputan Kurir | Mitra Kamibox</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- NAVIGATION TOP -->
    <?php require '../nav-top.php'; ?>
    <!-- ============================= -->

    <div class="navigation">
        <ul>
            <div class="toggle">
                <img src="../assets/Logo Kamibox Putih.png" alt="Logo Kamibox" class="open">
                <img src="../assets/logo.png" alt="Logo Kamibox" class="close">
            </div>
            <li class="list">
                <b></b>
                <b></b>
                <a href="index.php">
                    <span class="icon">
                        <img src="../assets/Icon/home_p.png" alt="Beranda" class="putih">
                        <img src="../assets/Icon/home_h.png" alt="Beranda" class="hijau">
                    </span>
                    <span class="title">Beranda</span>
                </a>
            </li>
            <li class="list active">
                <b></b>
                <b></b>
                <a href="">
                    <span class="icon">
                        <img src="../assets/Icon/calendar_p.png" alt="Jadwal Kurir" class="putih">
                        <img src="../assets/Icon/calendar_h.png" alt="Jadwal Kurir" class="hijau">
                    </span>
                    <span class="title">Jadwal Penjemputan</span>
                </a>
            </li>
            <li class="list">
                <b></b>
                <b></b>
                <a href="input_data.php">
                    <span class="icon">
                        <img src="../assets/Icon/input_p.png" alt="Input Data" class="putih">
                        <img src="../assets/Icon/input_h.png" alt="Input Data" class="hijau">
                    </span>
                    <span class="title">Input Data</span>
                </a>
            </li>
            <li class="list">
                <b></b>
                <b></b>
                <a href="riwayat_transaksi.php">
                    <span class="icon">
                        <img src="../assets/Icon/transaction_p.png" alt="Riwayat Transaksi" class="putih">
                        <img src="../assets/Icon/transaction_h.png" alt="Riwayat Transaksi" class="hijau">
                    </span>
                    <span class="title">Riwayat Transaksi</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ====================================== -->
    <!-- ISI CONTENT -->
    <!-- ====================================== -->
    <div class="container">
        <div class="row header">
            <h2>Jadwal Penjemputan Kurir</h2>
            <h5>
                <a href="">Beranda</a>
                <span class="panah">></span>
                <a href="">Jadwal Penjemputan</a>
            </h5>
        </div>
        <div class="row">
            <div class="kotak">
                <div class="row2">
                    <div class="row3">
                        <div class="col">
                            <img src="../assets/Icon/trash.png" alt="Trash">
                        </div>
                        <div class="col pt-1 pb-4 pr-3">
                            <span class="tanggal">Sabtu, 26-2-2022 <span style="float: right;">Pukul : 09.30 WIB</span></span>
                            <span class="keterangan"><b>Sarah Rahmadanty</b></span>
                            <span class="alamat"><b>Alamat : </b>Jl. Tangguban Perahu, Kec. Padangsambian, Kab. Denpasar Barat Provonsi Bali</span>
                        </div>
                    </div>
                    <div class="row3 tombol pb-1">
                        <div class="col ml-4s">
                            <a href="#"><button class="btn">Lokasi</button></a>
                        </div>
                        <div class="col">
                            <a href="#"><button class="btn">Kontak</button></a>
                        </div>
                        <div class="col mr-4s">
                            <a href="#"><button class="btn">Input Data</button></a>
                        </div>
                    </div>
                    <div class="isi-dropdown" id="isi-dropdown">
                        <input type="text" name="keterangan" placeholder="Masukan Keterangan Tambahan...">
                        <button type="submit" class="btn">Input</button>
                    </div>
                    <img src="../assets/Icon/arrow-point-to-right.png" alt="Panah" class="dropdown" id="dropdown">
                    <hr width="90%" size="2" style="color:rgba(0, 0, 0, 0.2);">
                </div>
                <div class="row2">
                    <div class="row3">
                        <div class="col">
                            <img src="../assets/Icon/trash.png" alt="Trash">
                        </div>
                        <div class="col pt-1 pb-4 pr-3">
                            <span class="tanggal">Sabtu, 26-2-2022 <span style="float: right;">Pukul : 09.30 WIB</span></span>
                            <span class="keterangan"><b>Sarah Rahmadanty</b></span>
                            <span class="alamat"><b>Alamat : </b>Jl. Tangguban Perahu, Kec. Padangsambian, Kab. Denpasar Barat Provonsi Bali</span>
                        </div>
                    </div>
                    <div class="row3 tombol pb-1">
                        <div class="col ml-4s">
                            <a href="#"><button class="btn">Lokasi</button></a>
                        </div>
                        <div class="col">
                            <a href="#"><button class="btn">Kontak</button></a>
                        </div>
                        <div class="col mr-4s">
                            <a href="#"><button class="btn">Input Data</button></a>
                        </div>
                    </div>
                    <div class="isi-dropdown" id="isi-dropdown">
                        <input type="text" name="keterangan" placeholder="Masukan Keterangan Tambahan...">
                        <button type="submit" class="btn">Input</button>
                    </div>
                    <img src="../assets/Icon/arrow-point-to-right.png" alt="Panah" class="dropdown" id="dropdown">
                    <hr width="90%" size="2" style="color:rgba(0, 0, 0, 0.2);">
                </div>
            </div>
        </div>
    </div>

    <!-- ====================================== -->
    <!-- JAVA SCRIPT -->
    <!-- ====================================== -->
    <!-- Navigation Interactive -->
    <script>
        let list = document.querySelectorAll('.navigation .list'); //NAVIGATION
        let nav_dropdown = document.querySelectorAll('.nav-dropdown #nav-ListDropdown');
        let nav_ListDropdown = document.querySelectorAll('.navigation-top ul li .nav-ListDropdown');
        let dropdown = document.querySelectorAll('.row .kotak .row2 img.dropdown');
        let isi_dropdown = document.querySelectorAll('.row .kotak .row2 #isi-dropdown');

        //Navbar Sebelah Kiri
        // for (let i = 0; i < list.length; i++) {
        //     list[i].onclick = function() {
        //         let j = 0;
        //         while (j < list.length) {
        //             list[j++].className = "list";
        //         }
        //         list[i].className = "list active";
        //     }
        // }

        //Dropdown Navigasi
        {
            let active = 0;
            for (let i = 0; i < nav_dropdown.length; i++) {
                nav_dropdown[i].onclick = function() {
                    let j = 0;
                    if (active == 0) {
                        while (j < nav_ListDropdown.length) {
                            nav_ListDropdown[j++].className = "nav-ListDropdown";
                        }
                        nav_ListDropdown[i].className = "nav-ListDropdown active";
                        active = 1;
                    } else {
                        while (j < nav_ListDropdown.length) {
                            nav_ListDropdown[j++].className = "nav-ListDropdown";
                        }
                        nav_ListDropdown[i].className = "nav-ListDropdown";
                        active = 0;
                    }

                }
            }
        }

        //Dropdown list menu harga
        {
            let active = 0;
            for (let i = 0; i < dropdown.length; i++) {
                dropdown[i].onclick = function() {
                    let j = 0;
                    while (j < isi_dropdown.length) {
                        isi_dropdown[j++].className = "isi-dropdown";
                        dropdown[j++].className = "dropdown";
                    }
                    if (active == 0) {
                        isi_dropdown[i].className = "isi-dropdown active";
                        dropdown[i].className = "dropdown active";
                        active = 1;
                    } else {
                        isi_dropdown[i].className = "isi-dropdown";
                        dropdown[i].className = "dropdown";
                        active = 0;
                    }
                }
            }
        }
    </script>

    <!-- Toggle Button untuk Navigation -->
    <script>
        let menuToggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }
    </script>

</body>

</html>