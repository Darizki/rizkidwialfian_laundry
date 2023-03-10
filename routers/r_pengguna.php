<?php

include_once '../controllers/c_pengguna.php';

$pengguna = new c_pengguna();

try {
    if (isset($_POST['tambah']) || isset($_POST['update'])) {

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $outlet = $_POST['id_outlet'];
        $role = $_POST['role'];

        if ($_GET['aksi'] == 'tambah') {

            $pengguna->insert($id, $nama, $username, $pass, $outlet, $role);
        } elseif ($_GET['aksi'] == 'update') {

            $pengguna->update($id, $nama, $username, $pass, $outlet, $role);
        }
    } elseif ($_GET['aksi'] == 'hapus') {

        $id = $_GET['id'];

        $pengguna->delete($id);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
