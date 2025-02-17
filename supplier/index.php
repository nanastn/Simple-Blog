<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
$sql = "SELECT * FROM supplier ";      
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../css/bootstrap.min.css">
    <title>Index Supplier</title>
</head>
<body>
<nav class="navbar navbar-expand bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-white">Toko Sayur</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a href="../index.php" class="nav-link active text-white" aria-current="page">Transaksi</a>
                    <a href="../pembeli/index.php" class="nav-link text-white">Pembeli</a>
                    <a href="../barang/index.php" class="nav-link text-white">Barang</a>
                    <a href="../supplier/index.php" class="nav-link text-white">Supplier</a>
                </div>
            </div>
            <div class="d-flex">
                <a href="../login/logout.php"><button class="btn btn-outline-danger">Logout</button></a>
            </div>
        </div>
    </nav><br><br><br><br>

    <h1 align="center">Index Supplier</h1>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data Supplier</b></p>
                <a href="tambah.php"><button class="btn btn-outline-light">Tambah</button></a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <tr class="table-dark">
                        <th>ID Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>NO HP</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($query as $r) : ?>
                        <tr>
                        <td><?= $r['id_supplier']?></td>
                        <td><?= $r['nama_supplier']?></td>
                        <td><?= $r['alamat']?></td>
                        <td><?= $r['no_hp']?></td>
                        <td>
                            <a href="edit.php?id_supplier= <?= $r['id_supplier']?>" class="btn btn-success">Edit</a> |
                            <a href="hapus.php?id_supplier= <?= $r['id_supplier']?>" class="btn btn-warning" onclick= "return confirm('yakin hapus?')">Hapus</a> 
                        </td>
                        </tr>
                        <?php endforeach; ?>
                </table>
                <a href="cetak.php" target="_BLANK" class="btn btn-info">Priview Print</a>
            </div>
        </div>
    </div>
</body>
</html>