<?php 
session_start();

		$id_user      = $_SESSION['id_user'];
        //$email_user   = $_SESSION['email_user'];
        //$telp_user    = $_SESSION['notelp_user'];

include '../connect_db.php';

	if($_POST['submit'] == 'input'){

		$nama     = $_POST['nama_pemasok'];
		$alamat   = $_POST['alamat_pemasok'];
		$tgl_beli = $_POST['tgl_beli'];
		$notelp   = $_POST['notelp_pemasok'];
		$email 	  = $_POST['email_pemasok'];

		$date = date('d-m-Y');


		if($nama == ""){
			$validasi['nama'] = 'nama harus diisi';
		}

		if($alamat == ""){
			$validasi['alamat'] = 'alamat harus diisi';
		}

		if($tgl_beli == ""){
			$validasi['tgl_beli'] = 'tanggal harus diisi';
		}else if ($tgl_beli !== $date){
			$validasi['tgl_beli'] = 'tanggal sesuaikan dengan saat ini';
		}

		
		$query_telp_pemasok = mysqli_query($conn,"select * from users where userlevelid = 3 and notelp = '$notelp'");
		$data = mysqli_num_rows($query_telp_pemasok);

		if($notelp == ""){
			$validasi['notelp'] = 'nomor ponsel harus diisi';
		}else if ( $data == 0 ){			
			$validasi['notelp'] = "nomor ponsel harus sesuai dengan akun pemasok";
		} 

		
		$query_email_3 = mysqli_query($conn,"select * from users where userlevelid = 3 and email = '$email' ");
		$data2 = mysqli_num_rows($query_email_3);

		if($email == ""){
			$validasi['email'] = 'email harus diisi';
		} else if( $data2 == 0 ){
			$validasi['email'] = 'email harus sesuai dengan akun pemasok';
		} 

		//mencocokkan email dan notelp

		$query_cocok1 = mysqli_query($conn, "select * from users where email = '$email' and userlevelid=3");
		$datac1 = mysqli_fetch_assoc($query_cocok1);
		if($notelp !== $datac1['notelp']){
			$validasi['notelp'] = "masukkan nomor posel yang sinkron dengan email pemasok";
		}

		$query_cocok2 = mysqli_query($conn, "select * from users where notelp = '$notelp' and userlevelid=3");
		$datac2 = mysqli_fetch_assoc($query_cocok2);
		if($email !== $datac2['email']){
			$validasi['email'] = "masukkan email yang sinkron dengan notelp pemasok";
		}




		if(empty($validasi)){
			//echo "<alert>input ok.</alert>";
			
			//simpan data input ke database
			
			$date2 = date_create($tgl_beli);
			$date3 = date_format($date2,"Y-m-d");

			$query2 = mysqli_query($conn, "select * from users where email = '$email'");
			$data2 = mysqli_fetch_assoc($query2);
			$pemasok_id = $data2['id_user'];

			$insert_data = mysqli_query($conn, "insert into input_data (mitra_id, pemasok_id, tgl_beli, nama, alamat, notelp, email) values ('$id_user', '$pemasok_id', '$date3','$nama', '$alamat', '$notelp', '$email')");

			if($insert_data == true){
				//simpan id_input ke session
				$select_id_data = mysqli_query($conn, "select id_data from input_data order by id_data desc limit 1");

				if($select_id_data == true){
					$data = mysqli_fetch_assoc($select_id_data);
					$_SESSION['id_data'] = $data['id_data'];
					header('location:input_data_1.php');
				}

			}else{
				echo "Gagal input data ke database";
			}

			
		}else{
			$_SESSION['validasi'] = $validasi;
			header('location:input_data.php?pesan=validasi');
		}
	}

?>