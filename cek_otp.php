<?php

session_start();

include 'connect_db.php';

//variabel inputan form
$otp1 = $_POST['otp1'];
$otp2 = $_POST['otp2'];
$otp3 = $_POST['otp3'];
$otp4 = $_POST['otp4'];





if ($otp1 === "") {
	$validasi['otp1'] = 'kolom ke-1 harus diisi.';
} else {
	if (!is_numeric($otp1)) {
		$validasi['otp1'] = 'isi kolom ke-1 harus berupa angka.';
	}
}

if ($otp2 === "") {
	$validasi['otp2'] = 'kolom ke-2 harus diisi.';
} else {
	if (!is_numeric($otp2)) {
		$validasi['otp2'] = 'isi kolom ke-2 harus berupa angka.';
	}
}

if ($otp3 === "") {
	$validasi['otp3'] = 'kolom ke-3 harus diisi.';
} else {
	if (!is_numeric($otp3)) {
		$validasi['otp3'] = 'isi kolom ke-3 harus berupa angka.';
	}
}

if ($otp4 === "") {
	$validasi['otp4'] = 'kolom ke-4 harus diisi.';
} else {
	if (!is_numeric($otp4)) {
		$validasi['otp4'] = 'isi kolom ke-4 harus berupa angka.';
	}
}


if (empty($validasi)) {
	//jika validasi form valid maka cek inputan otp

	$data_implode_otp = array($otp1, $otp2, $otp3, $otp4);
	$dataotp = implode('', $data_implode_otp); //*

	//$kodeotp = $_SESSION['kode_otp'];
	$id_otp = $_SESSION['idotp'];

	$cek_otp = mysqli_query($conn, "select * from kode_otp where id_kodeotp='$id_otp' and active='Y'");
	$data = mysqli_fetch_assoc($cek_otp);
	$kodeotp = $data['kodeotp'];

	if ($dataotp == $kodeotp) {
		//jika kode otp sudah sukses untuk pendaftaran maka 
		$id_user = $_SESSION['iduser'];
		//header('location:login.php');
		//die("<script>alert('Kode OTP Valid. Silahkan Masuk ke Sistem.')</script>");

		// ========================== api acurate ==========================

		// mengambil data user
		$get_data_user = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id_user'");

		$nama_lengkap = "";
		$tanggal = date("d/m/Y");
		$email = "";
		$alamat = "";
		$no_hp = "";
		while ($row = mysqli_fetch_object($get_data_user)) {
			$nama_lengkap .= $row->nama_lengkap;
			$email .= $row->email;
			$alamat .= $row->alamat;
			$no_hp .= @$row->no_hp;
		}

		// mengambil sesion db accurate
		$get_sesi_db_accuate = mysqli_query($conn, "SELECT * FROM tb_database_response_api");
		$access_token = "";
		$session_db = "";
		$host = "";
		while ($row = mysqli_fetch_object($get_sesi_db_accuate)) {
			$access_token .= $row->access_token;
			$session_db .= $row->session_db;
			$host .= $row->host;
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "$host/accurate/api/vendor/save.do",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "name=$nama_lengkap&transDate=$tanggal&email=$email&shipStreet=$alamat&mobilePhone=$no_hp&vendorNo=$id_user",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"Authorization: Bearer $access_token",
				"X-Session-ID: $session_db"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;

			//update idotp itu tidak aktif
			$update_status_otp = mysqli_query($conn, "update kode_otp set active ='N' where id_kodeotp='$id_otp'");

			//update iduser status aktif
			$update_status_user = mysqli_query($conn, "update users set active ='1' where id_user='$id_user'");

			echo "OTP Valid. Silahkan Masuk <a href='index.php'>Login</a>!";
		}

		// ========================== end sessi api acurate ==========================
	} else {
		//jika otp tidak valid
		//die("<script>alert('Maaf Kode OTP tidak Valid.')</script>");
		echo "OTP Tidak Valid. Silahkan Masukkan Kembali!";
		//kirim ulang otp update kodeotp dari idotp itu
	}
} else {
	//jiika validasi form otp tidak valid
	$_SESSION['validasi'] = $validasi;
	header('location:otp.php?pesan=validasi');
}
