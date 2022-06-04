<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include '../../../connect_db.php';

    // if (isset($_POST['submit'])) {
    $id = $_POST["param"];
    $nama = $_POST["nama"];
    $hpp = $_POST["hpp"];
    $harga = $_POST["harga"];

    $msg = [
        'error' => []
    ];

    if ($harga == '') {
        $msg['error'] = ['harga' => 'Harga barang tidak boleh kosong'];
    } else {
        if (!is_numeric($harga)) {
            $msg['error'] = ['harga' => 'Harga hanya berupa angka'];
        }
    }

    if ($nama == '') {
        $msg['error'] = ['nama' => 'Nama baranng tidak boleh kosong'];
    }

    if ($hpp == '') {
        $msg['error'] = ['hpp' => 'HPP barang tidak boleh kosong'];
    } else {
        if (!is_numeric($hpp)) {
            $msg['error'] = ['hpp' => 'HPP hanya berupa angka'];
        }
    }

    if (!empty($msg['error'])) {
        echo json_encode($msg);
    } else {
        $update_data = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama', HPP='$hpp', harga_barang='$harga' WHERE id_barang = '$id'");
        if ($update_data == true) {
            $msg = [
                'sukses' => [
                    'status' => 200
                ]
            ];
        } else {
            $msg = [
                'error' => [
                    'msg' => 'Terjadi kesalahan coba lagi'
                ]
            ];
        }

        echo json_encode($msg);
    }





    // }
}
