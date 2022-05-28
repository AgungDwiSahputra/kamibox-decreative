-input_data.php

<p>Hai, <?php echo $nama;?> ! <br/>silahkan input data</p>

<?php 
	
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="validasi"){
			$validasi = $_SESSION['validasi'];
				foreach ($validasi as $value) {
					echo "<p>".$value."</p>";
				}
		}
	}

$date = date('d-m-Y');
?>

<form action="proses_input_data.php" method="post">
	<input type="text" name="nama_pemasok" placeholder="Nama lengkap">
	<input type="text" name="alamat_pemasok" placeholder="Alamat">
	<input type="text" name="tgl_beli" placeholder="Tanggal beli : <?php echo $date;?>" style="width: 200px;">
	<input type="text" name="notelp_pemasok" placeholder="Nomor ponsel">
	<input type="email" name="email_pemasok" placeholder="Email">
	<input type="submit" name="submit" value="input">
</form>

<?php } ?>



--------------------------------------------------------------------------------------------------------input_data_1.php

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

<p> Pilih daur ulangmu</p>

<?php 

	if(isset($_GET['pesan'])){
		if($_GET['pesan']=='validasi'){
			$validasi = $_SESSION['validasi'];
			echo "<p>".$validasi."</p>";
		}
	}
?>

<form action="proses_input_data_1.php" method="post">
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
	<input type="submit" name="submit" value="pilih">
</form>

<?php }?>

--------------------------------------------------------

- input data 2.php

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

<?php 
include '../connect_db.php';
	
	$id_data = $_SESSION['id_data'];
	
	$query = mysqli_query($conn, "select distinct barang FROM input_item WHERE id_input_data = $id_data");
	//$query2 = mysqli_query($conn, "select * from barang FROM input_item where id_input_data = $id_data");

	if($query == true){
		
		//echo "ok tampilkan produk";
		while( $row=mysqli_fetch_array($query) ){
			// $row2=mysqli_fetch_array($query2)
			echo "<form action='proses_input_data_2.php' method='post'>";
			//echo $_SESSION['id_item']=$row2['id_input_item']." ";
			
			$id_barang = $row['barang'];
			$query2 = mysqli_query($conn, "select * from barang where id_barang = $id_barang ");

			if($query2==true){
				$data = mysqli_fetch_assoc($query2);
				$barang = $data['nama_barang'];
			}else{
				echo "gagal tampilkan nama barang";
			}
			echo $barang." ";
			echo "<input type='text' name='berat' placeholder='masukkan berat kg'>
			      <input type='submit' name='tambah' value='+'>";
			$total_berat=0;
			echo " Total berat : ".$total_berat;
			echo "<a href=rincian_berat.php> Rincian berat</a>";
			echo "</form>";

			//tampilkan inputan penimbangan ... kg
			//menampilkan berat id_item di input timbang item jika ada tampilkan jika tidak ada 0
			/*$id_input_item = $row2['id_input_item'];
			$query4 = mysqli_query($conn, "select * from input_timbang_item where id_input_item = $id_input_item ");
			
			$no=1;
			while($row3 = mysqli_fetch_array($query4)){
				echo "Penimbangan ". $no;
				echo $row3['berat']."<br/>";
			}			*/


			?>
			

			<?php
		echo "<br/>";
		}

	}else{
		echo "tidak bisa tampilkan data";
	}
	
/*
Jenis daur ulang

Arsip Kantor input 100 kg +
- penimbangan 1 : 70 kg 
- penimbangan 2 : 30 kg
- penimbangan 3 : 100 kg
total berat 200kg

Kardus input 100 kg +
- penimbangan 1 : 50 kg
- penimbangan 2 : 50 kg
total berat 100 kg

tambah
*/
?>

<?php }?>