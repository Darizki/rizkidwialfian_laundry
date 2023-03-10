<?php

include_once '../controllers/c_produk.php';

$produk = new c_produk();

try {
    if (isset($_POST['tambah']) || isset($_POST['update'])) {

        $id = $_POST['id'];
        $outlet = $_POST['id_outlet'];
        $jenis = $_POST['jenis'];
        $paket = $_POST['nama_paket'];
        $harga = $_POST['harga'];

        if ($_GET['aksi'] == 'tambah') {

            $produk->insert($id, $outlet, $jenis, $paket, $harga);
        } elseif ($_GET['aksi'] == 'update') {

            $produk->update($id, $outlet, $jenis, $paket, $harga);
        }
    } elseif ($_GET['aksi'] == 'hapus') {

        $id = $_GET['id'];

        $produk->delete($id);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
