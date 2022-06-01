<ul class="list_riwayat">
    <?php
    require '../connect_db.php';
    require '../session_data.php';

    /* Search */
    $s_keyword = "";
    if (isset($_POST['keyword'])) {
        $s_keyword = $_POST['keyword'];
    }
    $search_keyword = '%' . $s_keyword . '%';
    /* Riwayat Transaksi */
    $query_transaksi = mysqli_query($conn, "SELECT * FROM transaksi_pembelian WHERE mitra_id = '$id_user' AND no_invoice LIKE '$search_keyword' OR pemasok_id LIKE '$search_keyword' OR ttl_transaksi LIKE '$search_keyword'");
    $total_transaksi = mysqli_num_rows($query_transaksi);
    // Tabel Transaksi Pembelian
    if ($total_transaksi != 0) {
        while ($data_transaksi = mysqli_fetch_array($query_transaksi)) {
            $pemasok_id = $data_transaksi['pemasok_id'];
            $query_user = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$pemasok_id'");
            $data_user = mysqli_fetch_array($query_user);
    ?>
            <li>
                <div class="row2">
                    <div class="col">
                        <span class="tanggal"><?= $data_transaksi['ttl_transaksi'] ?></span>
                        <span class="nomor">#<?= $data_transaksi['no_invoice'] ?></span>
                    </div>
                </div>
                <div class="row2">
                    <div class="col">
                        <span class="keterangan"><b><?= $data_user['nama_lengkap'] ?> | (<?= $data_transaksi['total_berat']  ?>kg)</b></span>
                        <span class="harga"><b>Rp. <?= number_format($data_transaksi['harga'], 0, ',', '.') ?></b></span>
                    </div>
                </div>
                <div class="row2">
                    <div class="col">
                        <span class="alamat"><b>Alamat : </b><?= $data_transaksi['alamat'] ?></span>
                        <span class="status success">Berhasil</span>
                    </div>
                </div>
            </li>
            <hr width="80%" size="2" align="left" style="margin-left: 80px;color:rgba(0, 0, 0, 0.2);">
    <?php
        }
    } else {
        if (isset($_POST['keyword'])) {
            echo '<tr><td><center style="color:red;font-size:14px;">Data Transaksi tidak ditemukan</center></td></tr>';
        } else {
            echo '<tr><td><center style="color:red;font-size:14px;">Data Transaksi masih kosong</center></td></tr>';
        }
    }
    ?>
</ul>