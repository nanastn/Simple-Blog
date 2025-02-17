<?php

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
    <title>Index supplier</title>
</head>
<body>


    <h1 align="center">Index pembeli</h1>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data pembeli</b></p>
                
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <tr class="table-dark">
                        <th>ID Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>NO HP</th>
                    </tr>
                    <?php foreach ($query as $r) : ?>
                        <tr>
                        <td><?= $r['id_supplier']?></td>
                        <td><?= $r['nama_supplier']?></td>
                        <td><?= $r['alamat']?></td>
                        <td><?= $r['no_hp']?></td>
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