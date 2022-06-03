<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include '../../../connect_db.php';
    $id = $_GET['param'];
    $query2 = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");

    if ($query2) {
        $data_array = [];
        while ($row = $query2->fetch_assoc()) {
            $data_array = $row;
        }
        $msg = [
            'sukses' => $data_array
        ];
    } else {
        $msg = [
            'error' => 'Barang tidak ditemukan'
        ];
    }

    echo json_encode($msg);
}
