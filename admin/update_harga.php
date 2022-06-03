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

    <title>Update Harga | Admin Kamibox</title>

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
            <li class="list active">
                <b></b>
                <b></b>
                <a href="">
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
            <li class="list">
                <b></b>
                <b></b>
                <a href="jadwal_kurir.php">
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
            <h2>Update Harga</h2>
            <h5>
                <a href="">Beranda</a>
                <span class="panah">></span>
                <a href="">Update Harga</a>
            </h5>
        </div>
        <div class="row content" id="show-data">

        </div>
    </div>

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 999;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            /* background-color: #fefefe; */
            margin: 50px auto;
            /* 15% from the top and centered */
            /* padding: 20px; */
            /* border: 1px solid #888; */
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #fff;
            float: right;
            font-size: 28px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        input[type=text] {
            width: 100%;
            padding: 10px 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 5px;
            outline: none;
            border: 1px solid #ddd;
        }

        input[type=number] {
            width: 100%;
            padding: 10px 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 5px;
            outline: none;
            border: 1px solid #ddd;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .invalid {
            border-radius: 5px;
            border: 1px solid #ff1b6c !important;
        }

        .btn-send {
            padding: 6px 24px;
            background: #08ac4d;
            color: #fff;
            border: 1px solid #08ac4d;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-send:hover {
            background: #00652a;
            border: 1px solid #00652a;
        }

        .btn-cancel {
            padding: 6px 24px;
            background: #ffe700;
            /* color: #fff; */
            border: 1px solid #ffe700;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-cancel:hover {
            background: #baa900;
            border: 1px solid #baa900;
        }
    </style>

    <!-- modal area -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <form action="#" id="form-edit">
                <div style="display: flex; justify-content:space-between; align-items:center;padding: 20px;background: #08ac4d;color: #fff;border-top-left-radius: 25px;border-top-right-radius: 25px;">
                    <p>Form Edit Harga</p>
                    <span class="close">×</span>
                </div>
                <div style="background: #fff;padding: 20px;">
                    <div style="padding-bottom:15px;">
                        <label for="fname">Nama Barang</label>
                        <input type="text" name="param" hidden id="param">
                        <input type="text" name="nama" id="nama">
                        <p style="margin: unset;font-size: small;font-style: italic;color: #ff1b6c;font-weight: 100;" class="text-nama"></p>
                    </div>
                    <div style="padding-bottom:15px;">
                        <label for="fname">HPP</label>
                        <input type="number" min="0" name="hpp" id="hpp">
                        <p style="margin: unset;font-size: small;font-style: italic;color: #ff1b6c;font-weight: 100;" class="text-hpp"></p>
                    </div>
                    <div style="padding-bottom:15px;">
                        <label for="fname">Harga Barang</label>
                        <input type="number" min="0" name="harga" id="harga">
                        <p style="margin: unset;font-size: small;font-style: italic;color: #ff1b6c;font-weight: 100;" class="text-harga"></p>
                    </div>
                </div>
                <div style="background: #f7f7f7;padding: 20px;display: flex;justify-content: space-between;border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
                    <button type="submit" class="btn-send">Simpan</button>
                    <button type="button" class="btn-cancel">Batal</button>
                </div>
            </form>
        </div>

    </div>
    <!-- end modal area -->

    <!-- plugin -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- end plugin -->

    <!-- ajax -->
    <script>
        show_data()

        function show_data() {
            $.ajax({
                url: 'ajax/update_harga/data_harga.php',
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    $('#show-data').html(response.sukses)
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan silahkan coba lagi.");
                }
            })
        }

        $(document).on('click', '.ubah', function() {
            $.ajax({
                url: "ajax/update_harga/get_barang.php",
                type: "get",
                data: {
                    param: $(this).attr('data-param')
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        $('#myModal').show()
                        $('#param').val(response.sukses.id_barang)
                        $('#nama').val(response.sukses.nama_barang)
                        $('#hpp').val(response.sukses.HPP)
                        $('#harga').val(response.sukses.harga_barang)
                    } else {
                        alert(response.error)
                    }
                }
            })
        })

        $('.btn-cancel').on('click', function() {
            $('#myModal').hide()
        })

        $('.close').on('click', function() {
            $('#myModal').hide()
        })

        $('#form-edit').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: "ajax/update_harga/post_barang.php",
                type: "post",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        $('#show-data').html('')
                        $('#myModal').hide()
                        show_data()
                    } else {
                        if (response.error.nama) {
                            $('#nama').addClass('invalid')
                            $('.text-nama').html(response.error.nama)
                        } else {
                            $('#nama').removeClass('invalid')
                            $('.text-nama').html('')
                        }

                        if (response.error.hpp) {
                            $('#hpp').addClass('invalid')
                            $('.text-hpp').html(response.error.hpp)
                        } else {
                            $('#hpp').removeClass('invalid')
                            $('.text-hpp').html('')
                        }

                        if (response.error.harga) {
                            $('#harga').addClass('invalid')
                            $('.text-harga').html(response.error.harga)
                        } else {
                            $('#harga').removeClass('invalid')
                            $('.text-harga').html('')
                        }
                    }
                }
            })
        })
    </script>
    <!-- end ajax -->

    <!-- ====================================== -->
    <!-- JAVA SCRIPT -->
    <!-- ====================================== -->
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