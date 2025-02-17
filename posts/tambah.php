<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
if(isset($_POST["simpan"])){
    $title = $_POST["title"];
    $content = $_POST["content"];
    $created_at = date("Y-m-d", strtotime($_POST["created_at"]));  // Format the date properly

    $sql = "INSERT INTO posts (title, content, created_at) VALUES ('$title', '$content', '$created_at')";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?tambah=berhasil");
    } else {
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
                Tambah Post
            </div>          
            <div class="card-body">
                <form action="" method="post">
                    <label for="title"  class="mb-2 form-label">Judul Artikel</label>
                    <input type="text" name="title" id="title" class="mb-2 form-control" required >

                    <label for="content"  class="mb-2 form-label">Konten</label>
                    <input type="text" name="content" id="content" class="mb-2 form-control" required >

                    <label for="created_at" class="mb-2 form-label">Tanggal</label>
                    <input type="date" name="created_at" id="created_at" class="mb-2 form-control" required>


                    <button name="simpan" class="btn btn-outline-primary">Tambah</button>
                    <a href="index.php" class="btn btn-outline-warning">Kembali</a>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>


