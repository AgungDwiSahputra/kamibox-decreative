<?php
include '../connect_db.php';
require '../session_data.php';

//pastikan hanya pemasok yg boleh akses halaman ini
if ($level !== '2') {
    header("location:index.php");
}

//cek login
if ($status_login === true and !empty($email) and $level == '2') {
    //echo "pemasok page. <a href='logout.php'>Logout</a>";

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile | <?= $nama ?></title>
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
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
                <h2>Data Diri</h2>
                <h5>
                    <a href="index.php">Beranda</a>
                    <span class="panah">></span>
                    <a href="profile.php">Profile</a>
                </h5>
            </div>
            <div class="row body">
                <ul>
                    <?php


                    //query tampilkan nama barang
                    $query = mysqli_query($conn, "select * from users where id_user = $id_user");

                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<li>";
                        echo "<span class=jenis>Nama </span>";
                        echo "<span class=harga>" . $row['nama_lengkap'] . "</span>";
                        echo "</li>";
                        echo "<li>";
                        echo "<span class=jenis>Email </span>";
                        echo "<span class=harga>" . $row['email'] . "</span>";
                        echo "</li>";
                        echo "<li>";
                        echo "<span class=jenis>Nomor Ponsel </span>";
                        echo "<span class=harga>" . $row['notelp'] . "</span>";
                        echo "</li>";
                        echo "<li>";
                        echo "<span class=jenis>Alamat </span>";
                        echo "<span class=harga>" . $row['alamat'] . "</span>";
                        echo "</li>";
                    }

                    ?>
                </ul>

            </div>
        </div>
        <br /><br />

        <!-- ====================================== -->
        <!-- JAVA SCRIPT -->
        <!-- ====================================== -->
        <!-- Navigation Interactive -->
        <script>
            let list = document.querySelectorAll('.navigation .list'); //NAVIGATION
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




<?php } ?>