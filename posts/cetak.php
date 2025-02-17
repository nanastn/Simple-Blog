<?php

include "../koneksi/koneksi.php";
$sql = "SELECT * FROM posts ";      
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="../css/bootstrap.min.css">
    <title>Index Post</title>
</head>
<body>


<h1 align="center">Index Post Artikel</h1>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data Post Artikel</b></p>
                <a href="tambah.php"><button class="btn btn-outline-light">Tambah</button></a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <tr class="table-dark">
                        <th>ID Post Artikel</th>
                        <th>Judul Artikel</th>
                        <th>Konten</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    <?php foreach ($query as $r) : ?>
                        <tr>
                        <td><?= $r['id_post']?></td>
                        <td><?= $r['title']?></td>
                        <td><?= $r['content']?></td>
                        <td><?= $r['created_at']?></td>
                        <td>
                        </tr>
                        <?php endforeach; ?>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>
<script>
    window.print();
</script>