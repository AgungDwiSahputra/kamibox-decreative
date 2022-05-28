<?php 

//ada kolom email yang harus diinputkan lalu

?>
Kami akan mengirimkan kode otp terbaru Anda.

<?php 
session_start();

	if(isset($_GET['pesan'])){
		if($_GET['pesan']=='validasi'){
			$validasi = $_SESSION['validasi'];
			echo "<p>".$validasi."</p>";
		}
	}
?>

<form action="proses_akun_aktif.php" method="post">
	<input type="text" name="email" placeholder="masukkan email Anda">
	<input type="submit" name="submit" value="kirim otp">	
</form>


