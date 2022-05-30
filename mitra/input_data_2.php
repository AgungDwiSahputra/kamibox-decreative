<?php
session_start();
require '../connect_db.php';

/* SESSION SEBELUMNYA TETAP DI BAWA */
// var_dump($_SESSION['nama']);
// var_dump($_SESSION['alamat']);
// var_dump($_SESSION['nomor_p']);
// var_dump($_SESSION['email']);
// var_dump($_SESSION['ttl_transaksi']);
// foreach ($_SESSION['jumlah_item'] as $jumlah_item => $daur_ulang) {
//     var_dump($daur_ulang);
// }
// session_unset();

/* Jika Belum Menyelesaikan step awal */
if (!isset($_SESSION['jumlah_item'])) {
    header("Location: input_data_1.php");
}

$key = md5(rand(1, 999999999));
setcookie('key', $key, time() + (30 * 1), "/");

/* Proses Hapus Item Daur Ulang */
if (isset($_GET['hapus'])) {
    if ($_GET['key'] == $_COOKIE['key']) {
        $id = $_GET['hapus'];
        // var_dump($_SESSION['jumlah_item'][$id]);
        $_SESSION['hapus'] += 1;
        unset($_SESSION['jumlah_item'][$id]);
        unset($_SESSION['berat_item'][$_SESSION['jumlah_item'][$id]]);

        header("Location: input_data_2.php");
    }
}

/* Proses Input Berat */
if (isset($_POST['berat_item'])) {
    // var_dump($_POST['berat']);
    $id_item = $_POST['id_item'];
    $berat = $_POST['berat_item'];
    if (!isset($_SESSION['berat_item'][$id_item])) {
        $_SESSION['berat_item'][$id_item] = array();
    }
    $_SESSION['berat_item'][$id_item][count($_SESSION['berat_item'][$id_item])] = $berat;
    var_dump("JUMLAH : " . count($_SESSION['berat_item'][$id_item]) . "<br>");
    var_dump("| ID Item : " . $id_item . " | Berat : " . $berat);
    var_dump($_SESSION['berat_item'][$id_item]);
    // header("Location: input_data_2.php");
}
// unset($_SESSION[$id_item]);
// foreach ($_SESSION['berat_item'][$id_item] as $jumlah_item => $berat_item) {
//     var_dump($berat_item);
// }

// var_dump($_SESSION['jumlah_item'][0]);
/* INPUT DATA */
// Di Proses setelah user megklik tombol input data
if (isset($_POST['input_data'])) {
    // var_dump($_SESSION['nama']);
    // var_dump($_SESSION['alamat']);
    // var_dump($_SESSION['nomor_p']);
    // var_dump($_SESSION['email']);
    // var_dump($_SESSION['ttl_transaksi']);
    // foreach ($_SESSION['jumlah_item'] as $jumlah_item => $daur_ulang) {
    //     var_dump($daur_ulang);
    // }

    $nama = $_SESSION['nama'];
    $alamat = $_SESSION['alamat'];
    $nomor_p = $_SESSION['nomor_p'];
    $email = $_SESSION['email'];
    $ttl_transaksi = $_SESSION['ttl_transaksi'];
    $item = '';
    $berat = '';
    for ($i = 0; $i < count($_SESSION['jumlah_item']); $i++) {
        if ($i == (count($_SESSION['jumlah_item']) - 1)) {
            $item .= $_SESSION['jumlah_item'][$i];
        } else {
            $item .= $_SESSION['jumlah_item'][$i] . ", ";
        }
    }

    foreach ($_SESSION['jumlah_item'] as $jumlah_item => $daur_ulang) {
        for ($i = 0; $i < count($_SESSION['berat_item'][$jumlah_item]); $i++) {
            if ($i == (count($_SESSION['berat_item'][$jumlah_item]) - 1)) {
                $berat .= $_SESSION['berat_item'][$jumlah_item][$i] . " | "; //Kondisi Jika Akhiran akan menambahkan garis tegak
            } else {
                $berat .= $_SESSION['berat_item'][$jumlah_item][$i] . ", "; //Kondisi jika setiap peoses pembacaan di tambahkan ,
            }
        }
    }
    /* MEMASUKAN KE DATABASE */
    $id_user = $_SESSION['id_user'];
    $query = mysqli_query($conn, "INSERT INTO input_item VALUES ('','$id_user]','$item','$berat', '$datetime')");
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
    <div class="navigation-top">
        <ul>
            <li class="nav-left"><b>Hai,</b> De Creative Agency</li>
            <li class="nav-dropdown">
                <a href="#" id="nav-ListDropdown">
                    <img src="../assets/Icon/user.png" alt="Account" class="user">
                </a>
                <div class="nav-ListDropdown" id="user">
                    <div class="head">
                        <h4 style="margin: 0;">Profile</h4>
                    </div>
                    <div class="body">
                        <a href="#"><img src="../assets/Icon/arrow-point-to-right.png" alt="Panah"> Data Diri</a>
                    </div>
                    <div class="footer">
                        <a href="../logout.php" style="text-align:center;" class="btn">Logout</a>
                    </div>
                </div>
            </li>
            <li class="nav-dropdown">
                <a href="#" id="nav-ListDropdown">
                    <img src="../assets/Icon/bell.png" alt="Notifikasi" class="bell">
                </a>
                <div class="nav-ListDropdown" id="bell">
                    <div class="head">
                        <h4 style="margin: 0;">Notifikasi</h4>
                    </div>
                    <div class="body">
                        <a href="#">
                            <div class="row">
                                <div class="col">
                                    <img src="../assets/Icon/hvs.png" alt="Riwayat" id="riwayat">
                                </div>
                                <div class="col">
                                    <span class="tanggal">Sabtu, 26-2-2022</span>
                                    <span class="keterangan"><b>Transaksi Berhasil</b></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
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

        <!-- PHASE 3 -->
        <div id="phase-3">
            <div class="row">
                <h5>Jenis Daur Ulang</h5>
                <ul>
                    <?php
                    foreach ($_SESSION['jumlah_item'] as $jumlah_item => $daur_ulang) {
                    ?>
                        <li class="dropdown">
                            <a href="?hapus=<?= $jumlah_item ?>&key=<?= $key ?>">
                                <img src="../assets/Icon/delete-button.png" alt="Hapus" id="hapus">
                            </a>
                            <div class="list">
                                <span class="jenis"><?= $daur_ulang ?></span>
                                <img src="../assets/Icon/arrow-point-to-right.png" alt="panah" id="panah">
                                <form action="" method="POST" style="display: inline;" id="input_berat_item">
                                    <input id="id_item" type="text" name="id_item" value="<?= $jumlah_item ?>" hidden>
                                    <input id="berat_item" name="berat_item" type="number" class="total" placeholder="100" min="0">kg
                                    <button type="submit" class="btn_add"><img src="../assets/Icon/add-button.png" alt="Add" id="add"></button>
                                </form>
                            </div>
                            <ul class="isi-dropdown">
                                <div class="berat_list">
                                    <?php
                                    $no = 1; //Nomor untuk urutan berat
                                    $total_berat = 0; // Total Berat per Item Daur Ulang
                                    if (isset($_SESSION['berat_item'][$jumlah_item])) {
                                        foreach ($_SESSION['berat_item'][$jumlah_item] as $id_item => $berat_item) {
                                    ?>
                                            <li>
                                                <span class="daur_ulang">Penimbangan <?= $no ?>&emsp;: <?= $berat_item ?>kg</span>
                                            </li>
                                    <?php
                                            $total_berat += $berat_item; //Proses Perhitungan total berat per item
                                            $no++;
                                        }
                                    } else {
                                        echo '<li><span class="daur_ulang">Belum ada hasil penimbangan</span></li>';
                                    }
                                    ?>
                                </div>
                                <div class="berat_total">
                                    <li class="daur_ulang_total">
                                        <span>Total Berat&emsp;: <?= $total_berat ?>kg</span>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- Button -->
                <form action="input_data_1.php" method="POST">
                    <button type="submit" class="btn default" name="tambah_item" value="tambah_item">
                        Tambah
                    </button>
                </form>
            </div>
            <div class="row">
                <h5>Perkiraan Pendapatan</h5>
                <div class="kotak">
                    <?php
                    /* PERHITUNGAN */
                    $total_berat = 0; //Total Berat untuk di hitung total semua item daur ulang
                    $total_harga = 0; //Total Harga semua Item Daur Ulang
                    $biaya_penjemputan = 10000; //Harga per 1kg
                    $total_penjemputan = 0; //Total Penjemputan untuk total smua berat item daur ulang
                    $total_keseluruhan = 0;
                    foreach ($_SESSION['jumlah_item'] as $jumlah_item => $daur_ulang) {
                        /* Mengambil data barang */
                        $query = mysqli_query($conn, "SELECT * FROM barang WHERE nama_barang = '$daur_ulang'");
                        $data = mysqli_fetch_array($query);
                        // var_dump($data['harga_barang']);
                        if (isset($_SESSION['berat_item'][$jumlah_item])) { //Kondisi ketika SESSION TERSEDIA
                            foreach ($_SESSION['berat_item'][$jumlah_item] as $id_item => $berat_item) {
                                $total_berat += $berat_item; //Perhitungan total berat semua item
                                $total_harga += $data['harga_barang'] * $berat_item;
                                // echo $berat_item . ", ";
                            }
                        }
                    }
                    $total_penjemputan = $biaya_penjemputan * $total_berat;
                    $total_keseluruhan = $total_harga + $total_penjemputan;
                    ?>
                    <ul class="atas">
                        <li>
                            <span class="title">Total Harga</span>
                            <span class="keterangan"><?= number_format($total_harga, 0, ',', '.') ?></span>
                        </li>
                        <li>
                            <span class="title">Total Berat</span>
                            <span class="keterangan"><?= $total_berat ?>kg</span>
                        </li>
                        <li>
                            <span class="title">Biaya Penjemputan</span>
                            <span class="keterangan"><?= number_format($total_penjemputan, 0, ',', '.') ?></span>
                        </li>
                    </ul>
                    <h4 class="bawah">
                        <span class="title">Estimasi Pendapatan</span>
                        <span class="keterangan"><?= number_format($total_keseluruhan, 0, ',', '.') ?></span>
                    </h4>
                </div>
                <!-- Button -->
                <form action="" method="POST">
                    <button type="submit" class="btn default mt-4" name="input_data">Input Data</button>
                </form>
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
        let dropdown3 = document.querySelectorAll('#phase-3 ul li.dropdown #panah');
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

        //Dropdown Jenis Daur Ulangmu(Phase 3)
        {
            let active = 0;
            for (let i = 0; i < dropdown3.length; i++) {
                dropdown3[i].onclick = function() {
                    let j = 0;
                    if (active == 0) {
                        while (j < isi_dropdown3.length) {
                            isi_dropdown3[j++].className = "isi-dropdown";
                        }
                        isi_dropdown3[i].className = "isi-dropdown active";
                        active = 1;
                    } else {
                        while (j < isi_dropdown3.length) {
                            isi_dropdown3[j++].className = "isi-dropdown";
                        }
                        isi_dropdown3[i].className = "isi-dropdown";
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