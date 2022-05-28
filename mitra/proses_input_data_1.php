<?php 
session_start();

        $id_data      = $_SESSION['id_data'];

include '../connect_db.php';


	if($_POST['submit'] == "pilih"){

		$id_barang = $_POST['jenis_daur_ulang'];

		if($id_barang == ""){
			$validasi = "jenis daur ulang harus diisi";
		}

		if(empty($validasi)){

			//insert ke database
			$insert_input_item = mysqli_query($conn, "insert into input_item (id_input_data, barang ) values ('$id_data', '$id_barang')");

			if($insert_input_item == true){				
			    header('location:input_data_2.php?id='.$id_data);		
			}

			
		}else{
			$_SESSION['validasi'] = $validasi;
			header('location:input_data_1.php?pesan=validasi');
		}
	}


?>
