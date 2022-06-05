<?php
require '../connect_db.php';
require '../session_data.php';
/* =========================================================== */
//pastikan hanya pemasok yg boleh akses halaman ini
if ($level !== '2') {
    header("location:../index.php");
}
/* =========================================================== */
/* DATA YANG DI BAWA DARI PROSES SEBELUMNYA */
$invoice_session = $_SESSION['no_invoice'];
/* =========================================================== */
/* Jika Belum Menyelesaikan step awal */
if (!isset($_SESSION['no_invoice'])) {
    header("Location: input_data.php");
}

// Kondisi jika setelah memilih barang daur ulang tidak bisa kembali ketampilan ini dari URL kecuali dari button tambah pada tampilan menambahkan berat
if (isset($_SESSION['input_barang'])) {
    header("Location: input_data_2.php");
}

$query_barang = mysqli_query($conn, "SELECT * FROM barang"); //Mengambil Data Barang

/* MEMASUKAN SESSION ITEM DAUR ULANG */
if (isset($_POST['daur_ulang'])) {
    $id_barang = $_POST['daur_ulang'];
    $query_TrxBarang = mysqli_query($conn, "SELECT * FROM transaksi_barang WHERE no_invoice = '$invoice_session'");
    $tersedia = 0; //Untuk nilai kesamaan
    while ($barang_TrxBarang = mysqli_fetch_array($query_TrxBarang)) {
        if ($id_barang == $barang_TrxBarang['id_barang']) {
            $tersedia++;
        }
    }
    if ($tersedia == 0) {
        $id_pemasok = $_SESSION['id_pemasok'];
        $Input_Barang = mysqli_query($conn, "INSERT INTO transaksi_barang (`id`, `no_invoice`, `pemasok_id`, `id_barang`, `berat`) VALUES ('','$invoice_session','$id_pemasok','$id_barang','')");
        if ($Input_Barang) {
            $_SESSION['input_barang'] = 'sudah';
            header("Location: input_data_2.php");
        } else {
            header("Location: input_data_1.php");
        }
    } else {
?>
        <script>
            alert("Barang sudah dipilih");
        </script>
<?php
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
        <!-- PHASE 2 -->
        <div id="phase-2">
            <div class="row">
                <div class="btn kembali"><a href="input_data.php"><img src="../assets/Icon/arrow-point-to-right.png">Back</a></div>
                <ul>
                    <li class="dropdown">
                        <div class="list">
                            <span class="jenis"><img src="../assets/Icon/repeat-1.png" alt="Repeat" id="repeat">
                                <?php
                                if (isset($_SESSION['daur_ulang'])) {
                                    echo $_SESSION['daur_ulang'];
                                } else {
                                    echo 'Pilih jenis daur ulangmu';
                                }
                                ?>
                            </span>
                            <img src="../assets/Icon/arrow-point-to-right.png" alt="panah" id="panah">
                        </div>
                        <ul class="isi-dropdown">
                            <form action="" method="POST" id="form_data">
                                <input id="formField" type="text" name="daur_ulang" hidden>
                                <?php
                                while ($data = mysqli_fetch_array($query_barang)) {
                                    $id_barang = $data['id_barang'];
                                ?>
                                    <li onclick="pilih('<?= $id_barang ?>')">
                                        <span class="panah"><img src="../assets/Icon/arrow-point-to-right.png" alt="panah"></span>
                                        <span class="daur_ulang"><?= $data['nama_barang'] ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </form>
                        </ul>
                    </li>
                </ul>
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

        //Dropdown Pilih Daur Ulangmu(Phase 2)
        {
            let active = 0;
            for (let i = 0; i < dropdown2.length; i++) {
                dropdown2[i].onclick = function() {
                    let j = 0;
                    if (active == 0) {
                        while (j < isi_dropdown2.length) {
                            isi_dropdown2[j++].className = "isi-dropdown";
                        }
                        isi_dropdown2[i].className = "isi-dropdown active";
                        active = 1;
                    } else {
                        while (j < isi_dropdown2.length) {
                            isi_dropdown2[j++].className = "isi-dropdown";
                        }
                        isi_dropdown2[i].className = "isi-dropdown";
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

    <script>
        /* UNTUK PEMILIHAN ITEM DAUR ULANG */
        function pilih(nilai) {
            document.getElementById("formField").value = nilai;
            document.getElementById('form_data').submit();
        }
    </script>

</body>

</html>