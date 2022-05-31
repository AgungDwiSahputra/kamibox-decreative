<?php session_start();
// $datetime = date("Y-m-d H:i:s"); //Untuk Transaksi
$hari = date('D');
switch ($hari) {
    case 'Sun':
        $hari_ini = "Minggu";
        break;
    case 'Mon':
        $hari_ini = "Senin";
        break;
    case 'Tue':
        $hari_ini = "Selasa";
        break;
    case 'Wed':
        $hari_ini = "Rabu";
        break;
    case 'Thu':
        $hari_ini = "Kamis";
        break;
    case 'Fri':
        $hari_ini = "Jumat";
        break;
    case 'Sat':
        $hari_ini = "Sabtu";
        break;
    default:
        $hari_ini = "Tidak di ketahui";
        break;
}
$datetime = $hari_ini . ", " . date("m-d-Y"); //Untuk Transaksi

/* ===================================================== */
//cek status login user di session
$status_login = $_SESSION['login'];
$id_user      = $_SESSION['id_user'];
$email        = $_SESSION['email_user'];
$avatar       = $_SESSION['avatar_user'];
$nama         = $_SESSION['nama_user'];
$telp         = $_SESSION['notelp_user'];
$level        = $_SESSION['level_user'];
$status_user  = $_SESSION['status_user'];

if (($status_login !== true) && empty($email)) {
    header("location:login.php");
}
/* ====================================================== */