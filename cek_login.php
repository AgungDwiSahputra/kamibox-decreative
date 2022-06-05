<?php
	
session_start();

	include 'connect_db.php';

	if($_POST['submit'] == 'Masuk'){


		$email = $_POST['email'];

		//cek validasi kolom email
		if($email === ""){	
			$_SESSION['set_email']=$_POST['email'];
			header("location:login.php?email=kosong");

		}else{
			//jika validasi benar			//echo "Email anda adalah ". $email;}

			//cel akun
			$cek_email = mysqli_query($conn,"select * from users where email='$email'");
			$cek_rows = mysqli_num_rows($cek_email);
			if ($cek_rows>0) {         //echo "<br/>email ". $email." tersedia di database.";

				//cek status
				$cek_status_email = mysqli_query($conn,"select * from users where email='$email' and active='1'");
				$cek_rows_status = mysqli_num_rows($cek_status_email);
				if ($cek_rows_status>0) {   //echo "<br/>status akun ". $email." aktif.";

					//update data last_activity where email
					$date = date('Y-m-d H:i:s');
					$update_activity_login = mysqli_query($conn, "update users set last_activity = '$date' where email = '$email'");


					//cek level
					if($update_activity_login==true and $cek_rows>0)
					{
						$data = mysqli_fetch_assoc($cek_email);

						$_SESSION['login'] = true;
						$_SESSION['id_user'] = $data['id_user'];
						$_SESSION['nama_user'] = $data['nama_lengkap'];
						$_SESSION['level_user'] = $data['userlevelid'];
						$_SESSION['email_user'] = $data['email'];
						$_SESSION['notelp_user'] = $data['notelp'];
						$_SESSION['status_user'] = $data['active'];
						$_SESSION['avatar_user'] = $data['avatar'];


						if($data['userlevelid']=='1'){
			                //echo "<br/>level akun anda = admin";
			                header("location:admin/update_harga.php");
			            }elseif($data['userlevelid']=='2'){
			                //echo "<br/>level akun anda = mitra";
			                header("location:mitra/index.php");
			            }elseif($data['userlevelid']=='3'){
			                //echo "<br/>level akun anda = pemasok";
			                header("location:pemasok/index.php");
			            }
					}else{ 
						return false;
					}

				}else{
					//echo "<br/>status akun ". $email." tidak aktif.";
					$_SESSION['set_email']=$_POST['email'];
					header("location:login.php?email=tidak_aktif");
				}	

			}else{
				//echo "<br/>email ". $email." tidak tersedia di database.";
				$_SESSION['set_email']=$_POST['email'];
				header("location:login.php?email=tidak_tersedia");
			}
		}
	

	}elseif($_POST['submit'] == 'Daftar'){
		header("location:daftar.php");
	}
