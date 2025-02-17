<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:../login/login.php?logindulu");
}
include "../koneksi/koneksi.php";
if(isset($_POST["simpan"])){
    $id_post = $_GET["id_post"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $created_at = $_POST["created_at"];

    $sql = "UPDATE posts SET title='$title', content='$content', created_at='$created_at' WHERE id_post = '$id_post' ";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("location:index.php?edit=berhasil");
    }else{
        header("location:index.php?edit=gagal");
    }
}
$id_post = $_GET ["id_post"];
$sql_posts = "SELECT * FROM posts WHERE id_post = '$id_post'";      
$query_posts = mysqli_query($koneksi, $sql_posts);

while ($posts = mysqli_fetch_array($query_posts)) :
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
                Edit Post
            </div>          
            <div class="card-body">
                <form action="" method="post">
                <input type="hidden" name="id_post" id="id_post" class="mb-2 form-control" value="<?= $posts['id_post']?>" >
                    <label for="title"  class="mb-2 form-label">Judul Artikel</label>
                    <input type="text" name="title" id="title" class="mb-2 form-control" value="<?= $posts['title']?>" >

                    <label for="content"  class="mb-2 form-label">Konten</label>
                    <input type="text" name="content" id="content" class="mb-2 form-control" value="<?= $posts['content']?>" >

                    <label for="created_at"  class="mb-2 form-label">Tanggal</label>
                    <input type="date" name="created_at" id="created_at" class="mb-2 form-control" 
       value="<?= date('Y-m-d', strtotime($posts['created_at'])) ?>" >

                    <button name="simpan" class="btn btn-outline-primary">Edit</button>
                    <a href="index.php" class="btn btn-outline-warning">Kembali</a>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>
<?php endwhile;?>