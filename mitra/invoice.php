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
    <div class="container invoice">
        <div class="box">
            <div class="row header">
                <h2>Invoice</h2>
                <table align="right">
                    <tr>
                        <td>Kode Unit</td>
                        <td width="130px">0001</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>12/02/2022</td>
                    </tr>
                </table>
            </div>
            <div class="row body">
                <table class="list-produk">
                    <tr>
                        <th>Produk</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Pajak</th>
                        <th>Jumlah</th>
                    </tr>
                    <tr>
                        <td>Kardus</td>
                        <td>2kg</td>
                        <td>15000</td>
                        <td>PPN 10%</td>
                        <td>2 Ikat</td>
                    </tr>
                    <tr>
                        <td>Kardus</td>
                        <td>2kg</td>
                        <td>15000</td>
                        <td>PPN 10%</td>
                        <td>2 Ikat</td>
                    </tr>
                    <tr>
                        <td>Kardus</td>
                        <td>2kg</td>
                        <td>15000</td>
                        <td>PPN 10%</td>
                        <td>2 Ikat</td>
                    </tr>
                </table>
                <table class="rekam mt-4">
                    <tr>
                        <th>Subtotal</th>
                        <td width="130px">Rp. 1.580.000</td>
                    </tr>
                    <tr>
                        <th>Bonus</th>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <th>Pajak</th>
                        <td>Rp. 44.000</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>Rp. 1.546.000</td>
                    </tr>
                    <tr>
                        <th>Pajak Included</th>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <th>Lunas</th>
                        <td>Rp. 0</td>
                    </tr>
                    <tr>
                        <th>Jumlah Tagihan</th>
                        <td>Rp. 1.250.000</td>
                    </tr>
                </table>
            </div>
            <h4 class="text-align ml-4s mt-4">12 Februari 2022</h4>
        </div>
        <!-- Button -->
        <button type="submit" class="btn default mt-4 ml-5s">Print</button>
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