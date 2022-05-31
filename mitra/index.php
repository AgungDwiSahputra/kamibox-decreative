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

    <title>Dashboard | Mitra Kamibox</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="navigation-top">
        <ul>
            <li class="nav-left"><b>Hai,</b> <?= $nama ?></li>
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
                        <?php
                        /* RIWAYAT TRANSAKSI */
                        $query_transaksi = mysqli_query($conn, "SELECT * FROM transaksi_pembelian WHERE mitra_id = '$id_user'");
                        while ($data_transaksiN = mysqli_fetch_array($query_transaksi)) {
                        ?>
                            <a href="#">
                                <div class="row">
                                    <div class="col">
                                        <img src="../assets/Icon/hvs.png" alt="Riwayat" id="riwayat">
                                    </div>
                                    <div class="col">
                                        <span class="tanggal"><?= $data_transaksiN['ttl_transaksi'] ?></span>
                                        <span class="keterangan"><b>Transaksi Berhasil</b></span>
                                    </div>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
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
            <li class="list active">
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
    <div class="container dashboard">
        <div class="row header">
            <h2>Dashboard</h2>
        </div>

        <div class="row body">
            <div class="col grafik">
                <span class="judul">Grafik Terkini</span>
                <div id="basic-doughnut" style="height:250px;"></div>
                <span class="footer">Total Penjualan : <b>Rp. 12.000.000</b> </span>
            </div>
            <div class="col transaksi">
                <span class="judul">Riwayat Transaksi</span>
                <div class="table">
                    <table>
                        <?php
                        /* Riwayat Transaksi */
                        $query_transaksi = mysqli_query($conn, "SELECT * FROM transaksi_pembelian WHERE mitra_id = '$id_user'");
                        // Tabel Transaksi Pembelian
                        while ($data_transaksi = mysqli_fetch_array($query_transaksi)) {
                            $pemasok_id = $data_transaksi['pemasok_id'];
                            $query_user = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$pemasok_id'");
                            $data_user = mysqli_fetch_array($query_user);
                        ?>
                            <tr>
                                <td><?= $data_user['nama_lengkap'] ?></td>
                                <td>Rp. <?= number_format($data_transaksi['harga'], 0, ',', '.') ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <a href="riwayat_transaksi.php" id="selengkapnya">Selengkapnya</a>
            </div>
        </div>
        <div class="row footer">
            <div class="col">
                <span class="judul">Jadwal Penjemputan</span>
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
                            <a href="https://api.whatsapp.com/send?phone=XXXXXXXXXX&text=YYYYYY"><button class="btn">Kontak</button></a>
                        </div>
                        <div class="col mr-4s">
                            <a href="input_data.php"><button class="btn">Input Data</button></a>
                        </div>
                    </div>
                    <hr width="90%" size="2" style="color:rgba(0, 0, 0, 0.2);">
                </div>
                <a href="jadwal_penjemputan.php"><button type="submit" class="btn">Selengkapnya</button></a>
            </div>
        </div>
    </div>

    <!-- ====================================== -->
    <!-- JAVA SCRIPT -->
    <!-- ====================================== -->
    <script src="js/echarts-en.min.js"></script>

    <!-- Navigation Interactive -->
    <!-- Untuk Grafik -->
    <?php
    $query_TrxPembelian = mysqli_query($conn, "SELECT * FROM transaksi_pembelian WHERE mitra_id = '$id_user'");
    $TrxPembelian = mysqli_fetch_array($query_TrxPembelian);
    $query_Barang = mysqli_query($conn, "SELECT * FROM barang");
    $List_Barang = '';
    while ($List = mysqli_fetch_array($query_Barang)) {
        $List_Barang .= "'" . $List['nama_barang'] . "', ";
    }
    ?>
    <!-- =========================== -->
    <script>
        let list = document.querySelectorAll('.navigation .list');
        let nav_dropdown = document.querySelectorAll('.nav-dropdown #nav-ListDropdown');
        let nav_ListDropdown = document.querySelectorAll('.navigation-top ul li .nav-ListDropdown');

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

        // Toggle Button untuk Navigation 
        let menuToggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        menuToggle.onclick = function() {
            menuToggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }

        // ------------------------------
        // Basic pie chart
        // ------------------------------
        // based on prepared DOM, initialize echarts instance
        var basicdoughnutChart = echarts.init(document.getElementById('basic-doughnut'));

        var barang = "<?= $List_Barang ?>";
        console.log(barang);
        var option = {

            // Add legend
            legend: {
                orient: 'vertical',
                x: 'right',
                data: [barang]
            },

            // Add custom colors
            // color: ['#ffbc34', '#4fc3f7', '#2962FF', '#f62d51'],

            // Display toolbox
            toolbox: {
                show: false,
            },

            // Enable drag recalculate
            calculable: true,

            // Add series
            series: [{
                name: 'Grafik Terkini',
                type: 'pie',
                radius: ['40%', '60%'],
                center: ['41%', '45%'],
                itemStyle: {
                    normal: {
                        label: {
                            show: true
                        },
                        labelLine: {
                            show: true
                        }
                    },
                    emphasis: {
                        label: {
                            show: true,
                            formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                            position: 'center',
                            textStyle: {
                                fontSize: '13',
                                fontWeight: '800'
                            }
                        }
                    }
                },

                data: [{
                        value: 10,
                        name: 'kardus'
                    },
                    {
                        value: 9,
                        name: 'Plastik'
                    },
                    {
                        value: 2,
                        name: 'Logam'
                    },
                    {
                        value: 2,
                        name: 'Logam'
                    },
                    {
                        value: 2,
                        name: 'Logam'
                    },
                    {
                        value: 2,
                        name: 'Logam'
                    },
                    {
                        value: 2,
                        name: 'Logam'
                    },
                    {
                        value: 4,
                        name: 'Kaca'
                    }
                ]
            }]
        };

        basicdoughnutChart.setOption(option);
    </script>

</body>

</html>