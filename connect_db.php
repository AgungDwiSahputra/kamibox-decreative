<?php

// $server = "localhost";
// $user = "root";
// $pass = "";
// $database = "kamibox";
$server = "localhost";
$user = "decreat2_kami";
$pass = "ka!boxmidi";
$database = "decreat2_kami";


$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
} else {
    ("<script>alert('Sukses tersambung dengan database.')</script>");
}
