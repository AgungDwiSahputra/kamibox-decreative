<?php //echo " page";
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
			header("location:mitra/index.php");
		}



?>