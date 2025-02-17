<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
    $id_supplier = $_GET["id_supplier"];

    $sql = "DELETE FROM supplier WHERE id_supplier = '$id_supplier' ";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?hapus=berhasil");
    }else{
        header("location:index.php?hapus=gagal");
    }
?>
