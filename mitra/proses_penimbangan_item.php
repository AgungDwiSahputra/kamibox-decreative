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
        $id_data      = $_SESSION['id_data'];
        $id_item      = $_SESSION['id_item'];
        //$id_item	  = $_GET['id'];

include '../connect_db.php';


	if($_POST['tambah'] == "+"){

		$berat = $_POST['berat'];

		if($berat =""){
			$validasi['berat'] = "masukkan berat kedalam kg";
		}elseif(!is_numeric($berat)){
			$validasi['berat'] = "masukkan berat berupa angka";
		}

		//if(empty($validasi)){
			//masukkan berat
			//masukkan kg berat update
			//UPDATE `input_item` SET `penimbangan` = '1', `berat` = '100' WHERE `input_item`.`id_input_item` = 12;

			//$berat = 80;
			$update_berat_item = mysqli_query($conn, "update input_item set berat=$berat where id_input_item = $id_item");

			if($update_berat_item==true){
				
				echo "sukses".$berat." ".$id_item;
				///header("location:input_data_2.php");
			}else{
				echo "gagal ".$berat." ".$id_item;
			}

		//}




	}

?>