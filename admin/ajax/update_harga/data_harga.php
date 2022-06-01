<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include '../../../connect_db.php';
    $query2 = mysqli_query($conn, "select * from barang");
    if ($query2 == TRUE) {
        # code...
        $loop = "";
        while ($row = mysqli_fetch_object($query2)) {
            $nama_barang = $row->nama_barang;
            $hpp = $row->HPP;
            $harga_barang = number_format($row->harga_barang, 2);

            $loop .= "<li class='dropdown'>
                        <div class='list'>
                            <span class='jenis'>$nama_barang</span>
                            <img src='../assets/Icon/arrow-point-to-right.png' alt='panah'>
                            <span class='harga'>Rp. $harga_barang/kg</span>
                        </div>
                        <ul class='isi-dropdown'>
                            <li>
                                <span class='title'>Nama Produk</span>
                                <span class='keterangan'>$nama_barang</span>
                            </li>
                            <li>
                                <span class='title'>HPP</span>
                                <span class='keterangan'>$hpp</span>
                            </li>
                            <li>
                                <span class='title'>Harga Jual</span>
                                <span class='keterangan'>$harga_barang</span>
                            </li>
                            <li>
                                <button type='button' class='btn ubah' data-param='$row->id_barang'>Ubah</button>
                            </li>
                        </ul>
                    </li>";
        }

        $html = "<ul>" . $loop . "
        </ul>

        <script>
        let list = document.querySelectorAll('.navigation .list');
        let nav_dropdown = document.querySelectorAll('.nav-dropdown #nav-ListDropdown');
        let nav_ListDropdown = document.querySelectorAll('.navigation-top ul li .nav-ListDropdown');
        let dropdown = document.querySelectorAll('.dropdown .list');
        let isi_dropdown = document.querySelectorAll('.content .dropdown .isi-dropdown');

        //Dropdown Navigasi
        {
            let active = 0;
            for (let i = 0; i < nav_dropdown.length; i++) {
                nav_dropdown[i].onclick = function() {
                    let j = 0;
                    if (active == 0) {
                        while (j < nav_ListDropdown.length) {
                            nav_ListDropdown[j++].className = 'nav-ListDropdown';
                        }
                        nav_ListDropdown[i].className = 'nav-ListDropdown active';
                        active = 1;
                    } else {
                        while (j < nav_ListDropdown.length) {
                            nav_ListDropdown[j++].className = 'nav-ListDropdown';
                        }
                        nav_ListDropdown[i].className = 'nav-ListDropdown';
                        active = 0;
                    }

                }
            }
        }

        //Dropdown list menu harga
        {
            let active = 0;
            for (let i = 0; i < dropdown.length; i++) {
                dropdown[i].onclick = function() {
                    let j = 0;
                    if (active == 0) {
                        while (j < isi_dropdown.length) {
                            isi_dropdown[j++].className = 'isi-dropdown';
                        }
                        isi_dropdown[i].className = 'isi-dropdown active';
                        active = 1;
                    } else {
                        while (j < isi_dropdown.length) {
                            isi_dropdown[j++].className = 'isi-dropdown';
                        }
                        isi_dropdown[i].className = 'isi-dropdown';
                        active = 0;
                    }
                }
            }
        }
    </script>
        ";

        $msg = [
            'sukses' => $html
        ];
    } else {
        $msg = ['error' => 'Data tidak ditemukan'];
    }

    echo json_encode($msg);
}
