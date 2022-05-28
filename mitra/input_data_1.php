<?php 
session_start();

//cek status login user di session
		$status_login = $_SESSION['login'];
		$id_user      = $_SESSION['id_user'];
        $email        = $_SESSION['email_user'];
        $avatar       = $_SESSION['avatar_user'];
        $nama         = $_SESSION['nama_user'];
        $telp         = $_SESSION['notelp_user'];
        $level        = $_SESSION['level_user'];
        $status_user  = $_SESSION['status_user'];	
		
        //cek login
		if(($status_login !== true) && empty($email)){
			header("location:login.php");
		}
		
        //pastikan hanya admin yg boleh akses halaman ini
		if($level !== '2'){
			header("location:index.php");
		}else{
			//echo "mitra page. <a href='logout.php'>Logout</a>";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">

    <title>Input Data | Mitra Kamibox</title>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
    	.btn-submit-jenis{
    		border-radius: 30px;
    		background-color: green;
    		color: white;
    		cursor: pointer;
    		width: 150px;
    		height: 30px;
    		
    	}
    </style>
</head>
<body>
	<div class="navigation-top">
        <ul>
            <li class="nav-left"><b>Hai,</b> <?php echo $nama;?></li>
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
        <!-- PHASE 2 -->
        <div id="phase-2">

            <div class="row">
                <div><b>Jenis Daur Ulang</b></div>
                <form action="proses_input_data_1.php" method="post" id="form_data">
                    <select name="jenis_daur_ulang" style="width:400px">
		
						<?php 
						include '../connect_db.php';
							$query = mysqli_query($conn, "select * from barang");
							if($query==true){

						        while($row=mysqli_fetch_array($query)){
						            echo "<option value=".$row['id_barang'].">".$row['nama_barang']."</option>";
						        }

						    }else{
						        echo "gagal tampilkan nama barang";
						    }
						
						?>

					</select>
					<input type="submit" name="submit" value="pilih" class="btn-submit-jenis">
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
        function pilih(i) {
            console.log(i);
            document.getElementById('form_data').submit();
        }
    </script>
</body>
</html>

<?php }?>