<?php

	session_start();


	include 'connect_db.php';

	//variabel inputan form
		$email = $_POST['email'];
		$nama = $_POST['nama'];
		$notelp = $_POST['notelp'];	

		 if($email = $_POST['email'] ){
			$_SESSION['set_email']=$email;	
		}else{
			$_SESSION['set_email']='';
		    unset($_SESSION['set_email']);
		}

		if($nama = $_POST['nama'] ){
			$_SESSION['set_nama']=$nama;	
		}else{
			$_SESSION['set_nama']='';
		    unset($_SESSION['set_nama']);
		}

		if($notelp = $_POST['notelp'] ){
			$_SESSION['set_notelp']=$notelp;	
		}else{
			$_SESSION['set_notelp']='';
		    unset($_SESSION['set_notelp']);
		}

/*

		$_SESSION['set_nama']=$nama;
		$_SESSION['set_email']=$email;
		$_SESSION['set_notelp']=$notelp;*/
	
	//cek variabel inputan form jika inputan kosong

	if(empty($nama)){

		$validasi['nama'] = 'nama harus diisi.';	
	}else{
		if(is_numeric($nama)){
			
			$validasi['nama'] = 'kolom nama harus berupa huruf.';	
		}else{
			if ( strlen ( $nama ) <=3) {

				$validasi['nama'] = 'panjang nama minimal 3 karakter.';
			}
		}
	}


	if(empty($email)){

		$validasi['email'] = 'email harus diisi.';	
	}else{
		//email sudah terdaftar
		$cek_email = mysqli_query($conn,"select * from users where email='$email'");
		$cek_rows = mysqli_num_rows($cek_email);
		if ($cek_rows>0) {

			$validasi['email'] = 'email sudah terdaftar.';
		}
	}


	if(empty($notelp)){

		$validasi['notelp'] = 'no telp harus diisi.';	
	}else{
		if (!is_numeric($notelp)) {

			$validasi['notelp'] = 'no telp harus berisi angka.';
		}else{
			if ( strlen ( $notelp ) <=11 and strlen ( $notelp ) >=13) {

				$validasi['notelp'] = 'panjang no telp minimal 11 - 13 karakter.';
			}else{
				//jika nomor sudah terdaftar
				$cek_nomor = mysqli_query($conn,"select * from users where notelp='$notelp'");
				$cek_rows = mysqli_num_rows($cek_nomor);
				if ($cek_rows>0) {

					$validasi['notelp'] = 'no telp sudah terdaftar.';
				}
			}
		}
	}


	
	
	if(empty($validasi)){
		//jika validasi kosong
		//session_unset();
		//echo"datar simpan";	
		//simpan inputan form
		//harus validasi checkbox
		$cek = $_POST['checklist'];
		if(empty($cek)){
			$validasi = 'checklist dahulu!';
			$_SESSION['validasi'] = $validasi;
			header('location:daftar.php?pesan=checklist');		
		}else{
		
			//echo"daftar tersimpan";
			//data registrasi di simpan ke db dg status tidak aktif kemudian langsung ke otp
			

			$_SESSION['email'] = $email;
			$_SESSION['nama'] = $nama;

         	$insert_daftar = mysqli_query($conn,"insert into users (email, nama_lengkap, notelp, userlevelid, active) values ('$email', '$nama', '$notelp', '3', '0')  ");

         	if($insert_daftar == true){
         		
         		$_SESSION['set_email']='';
				unset($_SESSION['set_email']);
				$_SESSION['set_nama']='';
    			unset($_SESSION['set_nama']);
    			$_SESSION['set_notelp']='';
    			unset($_SESSION['set_notelp']);

         		//simpan iduser
         		$select_id_user = mysqli_query($conn, "select id_user from users order by id_user desc limit 1;" );

         		if($select_id_user == true){

                	$data = mysqli_fetch_assoc($select_id_user);
                	$_SESSION['iduser'] = $data['id_user'];

                	//langsung generate otp dan
         			include 'build_otp.php';
         		
         			if(!empty(generate_otp($email))){
         			//otp dikirimkan ke email jika otp sukses dibuat
         			  
         			  	include 'send_email.php';

         			  	if(send_otp_via_email($email, $nama, $_SESSION['kode_otp'])==true)
         			  	{
         			  	  	//lalu ke tampilan otp melakukan validasi*
         			  	  	header('location:otp.php');	
         			  	}else{
         			  		
         			  	  	echo "gagal kirim otp ke email anda";
         			  	}

                	}                

         		}else{
         		
         			return false;
         		}

         	}else{
         		echo "insert registrasi gagal.";
         	}
		}
	

	}else{
		//jika validasi true
		$_SESSION['validasi'] = $validasi;
		header('location:daftar.php?pesan=validasi');
	}



?>