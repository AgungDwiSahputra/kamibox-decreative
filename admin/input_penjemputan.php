
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

    <title>Input Jadwal Penjemputan | Admin Kamibox</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="navigation-top">
        <ul>
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
                <a href="update_harga.php">
                    <span class="icon">
                        <img src="../assets/Icon/transaction_p.png" alt="Update Harga" class="putih">
                        <img src="../assets/Icon/transaction_h.png" alt="Update Harga" class="hijau">
                    </span>
                    <span class="title">Update Harga</span>
                </a>
            </li>
            <li class="list">
                <b></b>
                <b></b>
                <a href="riwayat_transaksi.php">
                    <span class="icon">
                        <img src="../assets/Icon/input_p.png" alt="Riwayat Transaksi" class="putih">
                        <img src="../assets/Icon/input_h.png" alt="Riwayat Transaksi" class="hijau">
                    </span>
                    <span class="title">Riwayat Transaksi</span>
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
                    <span class="title">Jadwal Kurir</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ====================================== -->
    <!-- ISI CONTENT -->
    <!-- ====================================== -->
    <div class="container">
        <div class="row header">
            <h2>Input Jadwal Penjemputan</h2>
            <h5>
                <a href="">Beranda</a>
                <span class="panah">></span>
                <a href="">Jadwal Kurir</a>
                <span class="panah">></span>
                <a href="">Input Jadwal Penjemputan</a>
            </h5>
        </div>
        <div class="row">
            <div class="btn kembali"><a href="jadwal_kurir.php"><img src="../assets/Icon/arrow-point-to-right.png">Back</a></div>
            <form action="#" method="POST" class="input_jadwal">
                <input type="text" name="nama_p" placeholder="Nama Pemasok">
                <input type="text" name="alamat" placeholder="Alamat Lengkap / Copy Link Maps">
                <input type="text" name="waktu" placeholder="Waktu / Tanggal Penjemputan">
                <input type="text" name="kode_p" placeholder="Kode Pemasok">
                <input type="text" name="nomor_p" placeholder="Nomor Ponsel">
                <span class="pesan">Note : Nomor telepon harus sesuai dengan nomor yang terdaftar di akun pemasok</span>
                <input type="email" name="email" placeholder="Email">
                <span class="pesan">Note : Email harus sesuai dengan yang terdaftar di akun pemasok</span>

                <!-- Button -->
                <button type="submit" class="btn">Input</button>
            </form>
        </div>
    </div>

    <!-- ====================================== -->
    <!-- JAVA SCRIPT -->
    <!-- ====================================== -->
    <!-- Navigation Interactive -->
    <script>
        let list = document.querySelectorAll('.navigation .list');
        let nav_dropdown = document.querySelectorAll('.nav-dropdown #nav-ListDropdown');
        let nav_ListDropdown = document.querySelectorAll('.navigation-top ul li .nav-ListDropdown');
        let dropdown = document.querySelectorAll('.dropdown .list');
        let isi_dropdown = document.querySelectorAll('.content .dropdown .isi-dropdown');

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
                    if (active == 0) {
                        while (j < isi_dropdown.length) {
                            isi_dropdown[j++].className = "isi-dropdown";
                        }
                        isi_dropdown[i].className = "isi-dropdown active";
                        active = 1;
                    } else {
                        while (j < isi_dropdown.length) {
                            isi_dropdown[j++].className = "isi-dropdown";
                        }
                        isi_dropdown[i].className = "isi-dropdown";
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