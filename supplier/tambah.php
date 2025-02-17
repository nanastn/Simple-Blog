<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
if(isset($_POST["simpan"])){
    $nama_supplier = $_POST["nama_supplier"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];

    $sql = "INSERT INTO supplier (nama_supplier,alamat,no_hp) VALUES ('$nama_supplier','$alamat','$no_hp')";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?tambah=berhasil");
    }else{
        header("location:index.php?tambah=gagal");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Tambah</title>
</head>
<body>
<br><br><br><br><br><br><br><br>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                Tambah Supplier
            </div>          
            <div class="card-body">
                <form action="" method="post">
                    <label for="nama_supplier"  class="mb-2 form-label">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" class="mb-2 form-control" required >

                    <label for="alamat"  class="mb-2 form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mb-2 form-control" required >

                    <label for="no_hp"  class="mb-2 form-label">NO HP</label>
                    <input type="number" name="no_hp" id="no_hp" class="mb-2 form-control" required >

                    <button name="simpan" class="btn btn-outline-primary">Tambah</button>
                    <a href="index.php" class="btn btn-outline-warning">Kembali</a>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>


