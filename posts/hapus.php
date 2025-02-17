<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
    $id_post = $_GET["id_post"];

    $sql = "DELETE FROM posts WHERE id_post = '$id_post' ";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?hapus=berhasil");
    }else{
        header("location:index.php?hapus=gagal");
    }
?>
