<?php 
session_start();
include '../connect_db.php';
include 'session_timeout.php';

//cek status login user di session //
		$status_login = $_SESSION['login'];
		$id_user      = $_SESSION['id_user'];
        $email        = $_SESSION['email_user'];
        $avatar       = $_SESSION['avatar_user'];
        $nama         = $_SESSION['nama_user'];
        $telp         = $_SESSION['notelp_user'];
        $level        = $_SESSION['level_user'];
        $status_user  = $_SESSION['status_user'];	
		

		if(($status_login !== true) && empty($email)){
			header("location:login.php");
		}
		
        //pastikan hanya pemasok yg boleh akses halaman ini
		if($level !== '3'){
			header("location:index.php");
		}

		//cek login
		if($status_login === true and !empty($email) and $level == '3'){
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Riwayat Transaksi| Pemasok Kamibox</title>
	<link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
	<!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
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
            <li class="list active">
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
        <div class="row header">
            <h2>Riwayat Transaksi</h2>
            <h5>
                <a href="index.php">Beranda</a>
                <span class="panah">></span>
                <a href="riwayat_transaksi.php">Riwayat Transaksi</a>
            </h5>
        </div>
        <div class="row">
            <ul class="list_riwayat">
                <?php 
                $querycekrw = mysqli_query($conn, "select * from transaksi_pembelian where pemasok_id=$id_user ORDER BY date_grafik DESC");
                        include 'hari_indo.php';

                //cek ketersediaan transaksi pembelian di pemasok
                $cekjmltr = mysqli_num_rows($querycekrw);
                if ($cekjmltr == 0){
                    echo "<div style='color:red'>Belum ada transaksi pembelian</div>";
                }else{
                                                
                        ?>

        <?php 
        	include '../connect_db.php';
			include 'hari_indo.php';
        	
        	$query = mysqli_query($conn,"SELECT transaksi_pembelian.date_grafik as tgl, users.nama_lengkap as nama, transaksi_pembelian.total_berat as berat, users.alamat as alamat, transaksi_pembelian.harga, transaksi_pembelian.no_invoice, transaksi_pembelian.status_transaksi FROM transaksi_pembelian INNER JOIN users ON transaksi_pembelian.pemasok_id = users.id_user where transaksi_pembelian.pemasok_id = $id_user ORDER BY transaksi_pembelian.date_grafik DESC");
        	
        	while($row=mysqli_fetch_array($query)){

        		$date = $row['tgl'];

        		$date1 = date_create($date);
        		$date2 = date_format($date1,'l');
        		$date3 = hariIndo($date2);
        		$date4 = $date3.", ".date_format($date1,'d/m/Y');
        ?>
        		<li>
                    <div class="row2">
                        <div class="col">
                            <span class="tanggal"><?php echo $date4;?></span>
                            <span class="nomor">#<?php echo $row['no_invoice']?></span>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="col">
                            <span class="keterangan"><b><?php echo $row['nama'];?> | (<?php echo $row['berat']?> kg)</b></span>
                            <span class="harga"><b>
                          <?php 
                            $harga = $row['harga'];
                            $harga2 = number_format($harga, 2, ",", ".");
                            echo "Rp ".$harga2;
                             ?>
                             </b></span>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="col">
                            <span class="alamat"><b>Alamat : </b><?php echo $row['alamat']?></span>
                            <span class="status success">
                            	<?php 
                            	$status = $row['status_transaksi'];
                            	if($status == 1){
                            		echo "Berhasil";
                            	}else{
                            		echo "Gagal";
                            	}

                        ?></span>
                        </div>
                    </div>
                </li>
                <hr width="80%" size="2" align="left" style="margin-left: 80px;color:rgba(0, 0, 0, 0.2);">
<?php      	}
        ?>	
              <?php } ?>              
            </ul>
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


<?php }?>