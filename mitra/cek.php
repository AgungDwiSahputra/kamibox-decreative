<?php 
error_reporting(0);
//include '../connect_db.php';

$server = "localhost";
$user = "root";
$pass = "";
$database = "kamibox";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}else{
    ("<script>alert('Sukses tersambung dengan database.')</script>");
}

$query = mysqli_query($conn, "select * from input_item where id_input_data=20");

 if($query == true){
 	echo "true";

 }else{
 	echo "false";
 }

 echo "<br/>";

$no=1;

while($row=mysqli_fetch_array($query)){
    echo $no++ ." ";
    echo $row['produk']."<br/>";
}


$query2 = mysqli_query($conn, "select * from barang");
if($query2==true){
    echo "<br/> ok tampil data <br/>";
}else{
    echo "gagal tampil data";
}

$no=1;
while($row=mysqli_fetch_array($query2)){
    echo $no++ ." ";
    echo $row['nama_barang']."<br/>";
}


$query3 = mysqli_query($conn, "select * from barang");
    if($query3==true){
        //echo "ok";
        echo"<select>";
        while($row3=mysqli_fetch_array($query3)){
            echo "<option value=".$row3['nama_barang'].">".$row3['nama_barang']."</option>";
        }
        echo"</select>";
    }else{
        echo "gagal tampilkan nama barang";
    }


$berat=100;
$id_item = 18;

$update_berat_item = mysqli_query($conn, "update input_item set berat=$berat where id_input_item = $id_item");

            if($update_berat_item==true){
                echo "sukses item =".$berat." kg";
            }else{
                echo "gagal";
            }

?>

<form action="cek.php" method="post">
    <input type="text" name="berat" placeholder="kg"><input type="submit" name="tambah" value="+">
</form>

<?php 
if($_POST['tambah']="+"){
    $berat = $_POST['berat'];
    echo $berat;
}


$email = "ceamey@yahoo.co.id";

$query_email_3 = mysqli_query($conn,"select * from users where userlevelid = 3 and email = '$email'");
$data2 = mysqli_num_rows($query_email_3);

        if($email == ""){
           echo $validasi = 'email harus diisi';
        } else if( $data2 == 0 ){
           echo $validasi = 'email harus sesuai dengan akun pemasok';
        }else{
            echo "success email";
        }

        
?>

<br/><br/>
<?php
session_start();
$id_data = 51;
//tampilkan data item yg dibeli
$query_barang = mysqli_query($conn, "select distinct barang from input_item where id_input_data = '$id_data'");
while($row = mysqli_fetch_array($query_barang)){
    //tampilkan nama barang berdasarkan id
    $id_barang = $row['barang'];
    $query_nama_barang = mysqli_query($conn, "select * from barang where id_barang = '$id_barang'");
    $data_br = mysqli_fetch_assoc($query_nama_barang);
    echo $data_br['nama_barang']."<br/>";
    //echo $_SESSION['total_berat']." <br/>";
    //tampilkan semua barang dari id_barang
    $query_semua_barang = mysqli_query($conn, "select * from input_item where barang = $id_barang and id_input_data = $id_data");

    $no=1;
    $total_berat=0;
    while($row2 = mysqli_fetch_array($query_semua_barang)){
        echo $row2['id_input_item']." ";
        echo "Penimbangan ".$no++ ." ";
        echo $berat = $row2['berat']. "kg <br/>"; 

        $total_berat += $berat; 
    }

    //$query_total_berat=mysqli_query($conn, "select sum(berat) as total_berat where barang = $id_barang and id_input_data = $id_data");

    //$data_br = mysqli_fetch_array($query_total_berat);
    //$insert_total_berat = mysqli_query($conn, "insert into input_total_berat_barang (barang,id_data,total_berat) values ('$id_barang', '$id_data','$total_berat')");

    //if($insert_total_berat){
        echo "Total berat : ".$_SESSION['total_berat']=$total_berat."<br/><br/>";        
    //}  
    
    
    
}

?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        .btn{
            text-align: center;
            border-radius:30px ;            
        }

    </style>
</head>
<body>
<input type="submit" name="" class="btn" value="input">
</body>
</html>





<?php 
$id_data = 61;
$query = mysqli_query($conn, "select * from input_item where id_input_data = $id_data ");

if($query==true){
echo "y";
    
    //berapakah jumlah id_item, cari jumlah id_input_item
    //SELECT COUNT(`id_input_item`) as total_item FROM `input_item` WHERE `id_input_data`=61
    $query2 = mysqli_query($conn, "select count('id_input_item') as total_item from input_data where id_input_data = $id_data");
    if($qyery2==true){
        $data = mysqli_fetch_assoc($query2);
        echo $data['total_item']." a";   
    }else{
        echo "tdk terhitung";
    }
}else{
    echo "n";
}
?>



