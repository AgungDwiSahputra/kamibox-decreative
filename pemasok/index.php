<?php

session_start();
include '../connect_db.php';

//cek status login user di session
$status_login = $_SESSION['login'];
$id_user      = $_SESSION['id_user'];
$email        = $_SESSION['email_user'];
$avatar       = $_SESSION['avatar_user'];
$nama         = $_SESSION['nama_user'];
$telp         = $_SESSION['notelp_user'];
$level        = $_SESSION['level_user'];
$status_user  = $_SESSION['status_user'];

if (($status_login !== true) && empty($email)) {
    header("location:login.php");
}

//pastikan hanya pemasok yg boleh akses halaman ini
if ($level !== '3') {
    header("location:index.php");
}

//cek login
if ($status_login === true and !empty($email) and $level == '3') {
    //echo "pemasok page. <a href='logout.php'>Logout</a>";

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
        <link rel="shortcut icon" type="image/png" href="../assets/icon.png">

        <title>Dashboard Pemasok| Pemasok Kamibox</title>

        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">

        <style type="text/css">
            /* ================================= */
            /* CONTENT LEFT RIGHT GRAFIK*/
            /* ================================= */

            .dashboard-wrapper {
                margin: auto;
                display: flex;

            }

            .row2 {
                margin-left: 150px;
                margin-top: 30px;
            }

            .row3 {
                margin-right: 250px;
                margin-top: 40px;
            }

            .row4 {
                margin-right: 250px;
                margin-top: 30px;
            }

            .card-grafik {
                width: 500px;
                box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.3);
                transition: 0.3s;
                border-radius: 30px;
                background-color: #FFF;
            }

            .card-artikel {
                display: flex;
                gap: 20px;
            }

            .swiper {
                width: 350px;
                height: 320px;
            }

            .swiper-slide {

                /* Center slide text vertically */
                display: -webkit-box;
                display: -ms-flexbox;
                display: -webkit-flex;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                -webkit-justify-content: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                -webkit-align-items: center;
                align-items: center;
            }




            .segmen-artikel {
                width: 200px;
                height: 250px;
                box-shadow: 0px 1px 8px 0px rgba(0, 0, 0, 0.3);
                transition: 0.3s;
                border-radius: 30px;
                background-color: #FFF;
            }

            .img-artikel {
                position: absolute;
                width: 200px;
                height: 250px;
                border-radius: 30px;
            }

            .segmen-content-blogs {
                position: absolute;
                width: 200px;
                height: 180px;
                border-radius: 30px;
                background-color: rgba(255, 255, 255, 0.8);
                margin-top: 70px;
            }

            .segmen-isi-blog {
                padding: 0 30px;
                font-size: 0.7rem;
            }

            .segmen-content-blogs .segmen-button-blog {
                margin-top: 5px;
                text-align: center;
            }

            .segmen-isi-blog .judul-blog {
                font-weight: 700;
                margin-bottom: 10px;
            }

            .segmen-button-blog .btn-blog {
                font-weight: 500;
                color: #069B45;
                background-color: #FFF;
                margin: 40px 0;
                padding: 8px 20px;
                border-radius: 50px;
                font-family: var(--main-font);
                border: 1px solid green;
                font-size: 0.7rem;
            }

            .card-transaksi,
            .card-harga {
                width: 400px;
                box-shadow: 0px 1px 20px 0px rgba(0, 0, 0, 0.3);
                transition: 0.3s;
                border-radius: 30px;
                background-color: #FFF;

            }

            .heading-grafik,
            .heading-transaksi,
            .heading-harga {
                padding-top: 5px;
                padding-left: 30px;

            }

            .content-grafik {
                margin: 0 30px;
            }

            .content-transaksi,
            .content-harga {
                display: flex;
                gap: 80px;
                margin: 0 30px;
                font-size: 0.8rem;
            }

            .tanggal {
                font-weight: 99;
            }

            .total,
            .harga,
            .produk {
                font-weight: 700;
            }

            .harga,
            .produk {
                font-weight: 600;
            }

            .produk,
            .harga {
                line-height: 65%;
            }

            .tanggal,
            .total {
                line-height: 85%;
            }

            .btn-transaksi,
            .btn-harga {
                text-align: center;
                padding: 15px;
            }

            .btn-selengkapnya {
                font-weight: 500;
                color: #069B45;
                background-color: #FFF;
                margin: 40px 0;
                padding: 8px 20px;
                border-radius: 50px;
                font-family: var(--main-font);
                border: 1px solid var(--main-color);
                outline: none;
                font-size: 0.85rem;
            }
        </style>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            // Load Charts and the corechart package.
            google.charts.load("current", {
                packages: ["corechart"]
            });

            // Draw the pie chart when Charts is loaded.

            google.charts.setOnLoadCallback(drawChartItem);

            function drawChartItem() {
                // Create the data table for Sarah's pizza.              
                var jsonDataItem = $.ajax({
                    url: "http://localhost/kamibox6/pemasok/getDataItem.php",
                    type: "POST",
                    dataType: "json",
                    async: false
                }).responseText;
                var data = new google.visualization.DataTable(jsonDataItem);
                var options = {
                    title: "Grafik Total Transaksi barang",
                    width: 450,
                    height: 200,
                    pieHole: 0.8,
                    pieSliceTextStyle: {
                        color: 'black',
                    }

                };
                // Instantiate and draw the chart 
                var chart = new google.visualization.PieChart(document.getElementById('Item_chart_div'));
                chart.draw(data, options);
            }
        </script>

    </head>

    <body>
        <div class="navigation-top">
            <ul>
                <li class="nav-left"><b>Hai,</b> <?php echo $nama; ?></li>
                <li class="nav-dropdown">
                    <a href="#" id="nav-ListDropdown">
                        <img src="../assets/Icon/user.png" alt="Account" class="user">
                    </a>
                    <div class="nav-ListDropdown" id="user">
                        <div class="head">
                            <h4 style="margin: 0;">Profile</h4>
                        </div>
                        <div class="body">
                            <a href="profile.php"><img src="../assets/Icon/arrow-point-to-right.png" alt="Panah"> Data Diri</a>
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
                    <a href="riwayat_transaksi.php">
                        <span class="icon">
                            <img src="../assets/Icon/transaction_p.png" alt="Riwayat Transaksi" class="putih">
                            <img src="../assets/Icon/transaction_h.png" alt="Riwayat Transaksi" class="hijau">
                        </span>
                        <span class="title">Riwayat Transaksi</span>
                    </a>
                </li>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="daftar_harga.php">
                        <span class="icon">
                            <img src="../assets/Icon/input_p.png" alt="Input Data" class="putih">
                            <img src="../assets/Icon/input_h.png" alt="Input Data" class="hijau">
                        </span>
                        <span class="title">Harga Barang</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ====================================== -->
        <!-- ISI CONTENT -->
        <!-- ====================================== -->
        <div class="container">
            <div class="dashboard-wrapper">
                <!-- card grafik -->
                <div class="cards">
                    <div class="row2 card-grafik">
                        <div class="heading-grafik">
                            <h4>Grafik Terkini</h4>
                        </div>
                        <div class="content-grafik">
                            <?php
                            $rowsgrafik = array();
                            $tablegrafik = array();
                            $tablegrafik['cols'] = array(
                                array('id' => '', 'label' => 'Jenis barang', 'type' => 'string'),
                                array('id' => '', 'label' => 'Jumlah transaksi', 'type' => 'number')
                            );

                            $query1 = mysqli_query($conn, "select * from barang");
                            while ($row1 = mysqli_fetch_array($query1)) {
                                // 
                                $barang_id = $row1['id_barang'];

                                //jumlahbrang
                                $query2 = mysqli_query($conn, "select count(transaksi_barang.id_barang) as jml from transaksi_pembelian inner join transaksi_barang ON transaksi_pembelian.pemasok_id = transaksi_barang.pemasok_id where transaksi_pembelian.pemasok_id=$id_user and transaksi_barang.id_barang = $barang_id and transaksi_pembelian.date_grafik >=DATE_ADD(NOW(), INTERVAL -30 DAY) AND transaksi_pembelian.date_grafik <= DATE(NOW())");

                                while ($row2 = mysqli_fetch_array($query2)) {

                                    $temp_total_brg = array();
                                    $temp_total_brg[] = array('v' => (string) $row1['nama_barang']);
                                    $temp_total_brg[] = array('v' => (int) $row2['jml']);
                                    $rowsgrafik[]     = array('c' => $temp_total_brg);
                                }
                            }

                            $tablegrafik['rows'] = $rowsgrafik;
                            $jsonDataItem = json_encode($tablegrafik, true);
                            $_SESSION['jsonDataItem'] = $jsonDataItem;

                            ?>
                            <div id="Item_chart_div" style="width: 400px; height: 200px;"></div>
                        </div>
                        <?php
                        //query penjualan
                        $query3 = mysqli_query($conn, "SELECT SUM( `transaksi_pembelian`.`harga`) as total_harga FROM `transaksi_pembelian` INNER JOIN transaksi_barang ON transaksi_pembelian.pemasok_id = transaksi_barang.pemasok_id WHERE transaksi_pembelian.pemasok_id=$id_user and transaksi_pembelian.date_grafik >= DATE_ADD(NOW(), INTERVAL -30 DAY) AND transaksi_pembelian.date_grafik <= DATE(NOW())");
                        $data3 = mysqli_fetch_assoc($query3);
                        $total = $data3['total_harga'];
                        $total2 = number_format($total, 2, ",", ".");

                        ?>
                        <p style="margin-left:30px;padding-bottom: 10px;font-size: 0.85rem;">Total Penjualan : <span style="font-weight: 700;margin-left: 30px;">Rp <?php echo $total2 . " " . $id_user; ?></span> /30 hari terakhir</p>
                    </div>
                </div>
                <!-- end card grafik -->

                <div class="cards">
                    <!-- Swiper -->
                    <div class="row3 swiper mySwiper">
                        <div class="swiper-wrapper">

                            <?php
                            $query2 = mysqli_query($conn, "select * from blog");
                            while ($row = mysqli_fetch_array($query2)) {


                            ?>

                                <div class="swiper-slide">
                                    <div class="segmen-artikel">
                                        <div class="post-img">
                                            <img class="img-artikel" src="../<?php echo $row['img']; ?>">
                                        </div>
                                        <div class="segmen-content-blogs">
                                            <img class="img-bg-content-blog" src="">
                                            <div class="segmen-isi-blog">
                                                <p class="judul-blog"><?php echo $row['judul']; ?></p>
                                                <p class="isi-blog"><?php echo $row['isi']; ?></p>
                                            </div>
                                            <div class="segmen-button-blog">
                                                <a href='#' class='btn-blog'>selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>




                </div>


            </div>

        </div>

        <div class="container">
            <div class="dashboard-wrapper">

                <div class="cards">
                    <div class="row2 card-transaksi">
                        <div class="heading-transaksi">
                            <h4>Riwayat Transaksi</h4>
                        </div>
                        <div class="content-transaksi">
                            <?php
                            $query3 = mysqli_query($conn, "select * from transaksi_pembelian where pemasok_id=$id_user ORDER BY date_grafik DESC limit 6");
                            include 'hari_indo.php';

                            ?>

                            <div class="ct tanggal">
                                <?php
                                while ($row3 = mysqli_fetch_array($query3)) {

                                    $date = $row3['date_grafik'];
                                    $date1 = date_create($date);
                                    $date2 = date_format($date1, 'l');
                                    $tgl   = date_format($date1, 'd');
                                    $year  = date_format($date1, 'Y');
                                    $date3 = hariIndo($date2);
                                    $month = date_format($date1, 'm');
                                    $month2 = bulanIndo($month);
                                ?>
                                    <p><?php echo $date3 . ", " . $tgl . " " . $month2 . " " . $year; ?></p>
                                <?php } ?>
                            </div>

                            <div class="ct total">
                                <?php $query4 = mysqli_query($conn, "select * from transaksi_pembelian where pemasok_id=$id_user limit 6");

                                while ($row4 = mysqli_fetch_array($query4)) {
                                ?>
                                    <p><?php
                                        $harga = $row4['harga'];
                                        $harga2 = number_format($harga, 2, ",", ".");
                                        echo "Rp " . $harga2;
                                        ?></p>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="btn-transaksi">
                            <a href='riwayat_transaksi.php' class='btn-selengkapnya'>selengkapnya</a>
                        </div>
                    </div>

                </div>
                <div class="cards">
                    <div class="row4 card-harga">
                        <div class="heading-harga">
                            <h4>Daftar Harga</h4>
                        </div>
                        <div class="content-harga">

                            <div class="ct produk">
                                <?php
                                $query5 = mysqli_query($conn, "select * from barang limit 6");
                                while ($row5 = mysqli_fetch_array($query5)) {
                                ?>
                                    <p><?php echo $row5['nama_barang']; ?></p>
                                <?php } ?>

                            </div>

                            <div class="ct harga">
                                <?php
                                $query6 = mysqli_query($conn, "select * from barang limit 6");

                                while ($row6 = mysqli_fetch_array($query6)) {
                                ?>
                                    <p><?php
                                        $harga = $row6['harga_barang'];
                                        $harga2 = number_format($harga, 2, ",", ".");
                                        echo "Rp " . $harga2;
                                        ?></p>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="btn-harga">
                            <a href='#' class='btn-selengkapnya'>selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div><br /><br />


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

        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 30,
                slidesPreview: "auto",
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });
        </script>

        <script>
            var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?73829';
            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = url;
            var options = {
                "enabled": true,
                "chatButtonSetting": {
                    "backgroundColor": "#4dc247",
                    "ctaText": "Chat Kamibox",
                    "borderRadius": "25",
                    "marginLeft": "0",
                    "marginBottom": "50",
                    "marginRight": "50",
                    "position": "right"
                },
                "brandSetting": {
                    "brandName": "Kamibox",
                    "brandSubTitle": "Melayani dan menerima berbagai jenis daur ulang",
                    "brandImg": "",
                    "welcomeText": "Hai, Selamat Datang di Kamibox!\nAda yang bisa kami bantu?",
                    "messageText": "Hai juga, Saya ada pertanyaan tentang {{page_link}}",
                    "backgroundColor": "#0a5f54",
                    "ctaText": "Start Chat",
                    "borderRadius": "25",
                    "autoShow": false,
                    "phoneNumber": "6285735020915"
                }
            };
            s.onload = function() {
                CreateWhatsappChatWidget(options);
            };
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        </script>



    </body>

    </html>

<?php } ?>