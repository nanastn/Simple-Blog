<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
if(isset($_POST["simpan"])){
    $id_supplier = $_GET["id_supplier"];
    $nama_supplier = $_POST["nama_supplier"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];

    $sql = "UPDATE supplier SET nama_supplier='$nama_supplier', alamat='$alamat', no_hp='$no_hp' WHERE id_supplier = '$id_supplier' ";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?edit=berhasil");
    }else{
        header("location:index.php?edit=gagal");
    }
}
$id_supplier = $_GET ["id_supplier"];
$sql_supplier = "SELECT * FROM supplier WHERE id_supplier = '$id_supplier'";      
$query_supplier = mysqli_query($koneksi, $sql_supplier);

while ($supplier = mysqli_fetch_array($query_supplier)) :
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body>
<br><br><br><br><br><br><br><br>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                Edit Supplier
            </div>          
            <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id_supplier" id="id_supplier" class="mb-2 form-control" value="<?= $supplier['id_supplier']?>" >
                    <label for="nama_supplier"  class="mb-2 form-label">Nama Supplier</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" class="mb-2 form-control" value="<?= $supplier['nama_supplier']?>" >

                    <label for="alamat"  class="mb-2 form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="mb-2 form-control" value="<?= $supplier['alamat']?>" >

                    <label for="no_hp"  class="mb-2 form-label">NO HP</label>
                    <input type="number" name="no_hp" id="no_hp" class="mb-2 form-control" value="<?= $supplier['no_hp']?>" >

                    <button name="simpan" class="btn btn-outline-primary">Edit</button>
                    <a href="index.php" class="btn btn-outline-warning">Kembali</a>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>
<?php endwhile;?>