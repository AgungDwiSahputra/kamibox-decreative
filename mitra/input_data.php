<?php
require '../connect_db.php';
require '../session_data.php';
/* =========================================================== */
//pastikan hanya pemasok yg boleh akses halaman ini
if ($level !== '2') {
    header("location:../index.php");
}

// Memastikan jika mitra sudah mengisi data pemasok tidak akan bisa masuk kembali ke tampilan ini
if (isset($_SESSION['no_invoice'])) {
    header("Location: input_data_1.php");
}
/* =========================================================== */

$query = mysqli_query($conn, "SELECT * FROM users WHERE userlevelid = '1'");
$id = @$_POST['akun_customer'];
$query_user = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id'");
$data_user_id = mysqli_fetch_array($query_user);

/* Setelah klik button next */
if (isset($_POST['next'])) {
    $id_userPemasok = $_POST['id_user'];
    $alamat =  $_POST['alamat'];

    /* INVOICE */
    $invoice = date('mHis');
    $query = mysqli_query($conn, "INSERT INTO transaksi_pembelian VALUES ('$invoice','$id_user','$id_userPemasok',null,null, '$alamat',null,'$datetime')");
    if ($query) {
        $_SESSION['no_invoice'] = $invoice;

        header("Location: input_data_1.php");
    } else {
        header("Location: input_data.php");
    }
}

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

    <title>Input Data | Mitra Kamibox</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Select2 (Untuk inputan dalam select) -->
    <link rel="stylesheet" href="css/select2.min.css">

    <!-- JS Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
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
            <li class="list">
                <b></b>
                <b></b>
                <a href="jadwal_penjemputan.php">
                    <span class="icon">
                        <img src="../assets/Icon/calendar_p.png" alt="Jadwal Kurir" class="putih">
                        <img src="../assets/Icon/calendar_h.png" alt="Jadwal Kurir" class="hijau">
                    </span>
                    <span class="title">Jadwal Penjemputan</span>
                </a>
            </li>
            <li class="list active">
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
            <h2>Input Data</h2>
            <h5>
                <a href="">Beranda</a>
                <span class="panah">></span>
                <a href="">Input Data</a>
            </h5>
        </div>
        <div id="phase-1">
            <div class="row">
                <form action="" method="POST" class="input_jadwal">
                    <select onchange="this.form.submit()" name="akun_customer" id="akun_customer">
                        <option value="">-- PILIH AKUN PEMASOK --</option>
                        <?php
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <option <?php if (!empty($data['id_user'])) {
                                        echo $data['id_user'] == $id ? 'selected' : '';
                                    } ?> value="<?= $data['id_user'] ?>"><?= "[" . $data['id_user'] . "] " . $data['nama_lengkap'] . " (" . $data['notelp'] . ")" ?></option>
                        <?php
                            $no++;
                        }
                        ?>
                    </select>
                    <input type="text" name="id_user" placeholder="ID Pemasok" value="<?php if ($id != "") {
                                                                                            echo $data_user_id['id_user'];
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>" readonly>
                    <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php if ($id != "") {
                                                                                            echo $data_user_id['nama_lengkap'];
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>" readonly>
                    <input type="text" name="nomor_p" placeholder="Nomor Ponsel" value="<?php if ($id != "") {
                                                                                            echo $data_user_id['notelp'];
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>" readonly>
                    <span class="pesan">Note : Nomor telepon harus sesuai dengan nomor yang terdaftar di akun pemasok</span>
                    <input type="email" name="email" placeholder="Email" value="<?php if ($id != "") {
                                                                                    echo $data_user_id['email'];
                                                                                } else {
                                                                                    echo '';
                                                                                } ?>" readonly>
                    <span class="pesan">Note : Email harus sesuai dengan yang terdaftar di akun pemasok</span>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap / Copy Link Maps">

                    <!-- Button -->
                    <button type="submit" class="btn" name="next" value="next">Next</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ====================================== -->
    <!-- JAVA SCRIPT -->
    <!-- ====================================== -->
    <!-- Navigation Interactive -->
    <script>
        /* Select2 Jquery */
        $("#akun_customer").select2();

        let list = document.querySelectorAll('.navigation .list'); //NAVIGATION
        let nav_dropdown = document.querySelectorAll('.nav-dropdown #nav-ListDropdown');
        let nav_ListDropdown = document.querySelectorAll('.navigation-top ul li .nav-ListDropdown');
        let dropdown2 = document.querySelectorAll('#phase-2 ul li.dropdown .list');
        let isi_dropdown2 = document.querySelectorAll('#phase-2 ul li.dropdown ul.isi-dropdown');
        let dropdown3 = document.querySelectorAll('#phase-3 ul li.dropdown .list');
        let isi_dropdown3 = document.querySelectorAll('#phase-3 ul li.dropdown ul.isi-dropdown');

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