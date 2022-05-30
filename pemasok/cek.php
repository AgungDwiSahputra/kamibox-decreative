<?php 

include '../connect_db.php';
include 'hari_indo.php';

$query = mysqli_query($conn,"select * from rw_transaksi");

if($query == true){
	//echo "ok";

	while ($row = mysqli_fetch_array($query)){
		echo $row['id_rw_transaksi'] . ". ";
		//$row['tgl_beli'];

		$tgl = $row['Tgl_beli'];
		//$tgl = date('l, d-F-Y');

		$date1 = date_create($tgl);
		$date2 = date_format($date1,'l, d/m/Y');

		echo $date2 ." ";

		

		$date3 = date_format($date1,'l');
		$month = date_format($date1, 'm');

		$date4 = hariIndo($date3);
		$bln = bulanIndo($month);

		echo $date4." ";

		echo $date5 = $date4.", ".date_format($date1,'d/m/Y');
		echo " ".$date4.", ".date_format($date1,'d')." ".$bln." ".date_format($date1,'Y');
		echo "<br/>";
		
	}
}


$harga = 145;

$harga2 = number_format($harga, 2, ",", ".");
echo "Harga Rp ".$harga2;
?>





























