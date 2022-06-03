<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include '../../../connect_db.php';

    $value = $_POST['value'];

    if ($value) {
        $query2 = "SELECT transaksi_pembelian.*,users.nama_lengkap FROM `transaksi_pembelian` 
    INNER JOIN users ON users.id_user = transaksi_pembelian.pemasok_id
    WHERE users.nama_lengkap LIKE '$value%' OR users.notelp LIKE '$value%' AND users.userlevelid = '3'";
    } else {
        $query2 = "SELECT transaksi_pembelian.*,users.nama_lengkap FROM `transaksi_pembelian` 
        INNER JOIN users ON users.id_user = transaksi_pembelian.pemasok_id
        WHERE users.userlevelid = '3'";
    }

    $result = mysqli_query($conn, $query2);
    while ($row = $result->fetch_assoc()) {
        $data_array[] = $row;
    }

    echo json_encode($data_array);
}
