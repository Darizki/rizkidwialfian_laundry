<?php 
include_once 'c_koneksi.php';

class c_pelanggan{

    function insert($id, $nama, $alamat, $jk, $tlp){
        $conn = new c_koneksi();

        $sql = "INSERT INTO tb_member VALUES ('$id','$nama','$alamat', '$jk', '$tlp')";

        $query = mysqli_query($conn->koneksi(),$sql);


        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='../views/transaksi/v_registrasi_pelanggan.php'</script>";
         }

         else{

            echo "data gagal ditambahkan";
         }

    }

    function tampil(){
        $conn = new c_koneksi();

        $sql = "SELECT * FROM tb_member";

        $query = mysqli_query($conn->koneksi(), $sql);

        while($q = mysqli_fetch_object($query) ){

            $hasil[] = $q;
    }

        return $hasil;
    }

    function update($id, $nama, $alamat, $jk, $tlp)
    {
        $conn = new c_koneksi();

        $sql = "UPDATE tb_member SET  nama='$nama', alamat='$alamat', jk='$jk', tlp='$tlp' WHERE id='$id'";

        $query = mysqli_query($conn->koneksi(), $sql);


        if ($query) {

            echo "<script>alert('Data Berhasil Di Ubah');window.location='../views/transaksi/v_transaksi.php'</script>";
        } else {

            echo "data gagal diubah";
        }
    }

    function delete($id)
    {
        $conn = new c_koneksi();

        $query = "DELETE FROM tb_member WHERE id = $id";

        mysqli_query($conn->koneksi(), $query);

        header("location:../views/transaksi/v_transaksi.php");
    }


}

?>