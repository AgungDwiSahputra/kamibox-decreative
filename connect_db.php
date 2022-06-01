<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "kamibox";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
} else {
    ("<script>alert('Sukses tersambung dengan database.')</script>");
}
