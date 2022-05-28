<?php 
session_start();
include '../connect_db.php';

$id_data      = $_SESSION['id_data'];

	if($_POST['tambah']=="+"){

		$berat = $_POST['berat'];

		if($berat==""){
			echo "berat tidak boleh kosong";
		}elseif(!is_numeric($berat)){
			echo "berat harus berisi angka";
		}else{
			
			//numrows tampilkan jika berat=0 dan jumlah data 1 maka update, jika data 1 berat!=0 maka insert baru

			//tampilkan data dari id_data 
			$query = mysqli_query($conn, "select * from input_item where id_input_data = $id_data");
			
			

		}





	}
?>