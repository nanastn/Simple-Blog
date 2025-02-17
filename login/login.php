<?php
session_start();

include "../koneksi/koneksi.php";
if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($query)){
        $_SESSION['login'] = $username;
        header('location:../posts/index.php?login=sukses');
}else{
    header('location:login.php?login=gagal');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <br><br><br><br><br><br>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary text-white">
                Login
            </div>          
            <div class="card-body">
                <form action="" method="post">
                    <label for="username"  class="mb-2 form-label">Username</label>
                    <input type="text" name="username" id="username" class="mb-2 form-control" required >
                    <label for="password"  class="mb-2 form-label">Password</label>
                    <input type="password" name="password" id="password" class="mb-2 form-control" required >

                    <button name="simpan" class="btn btn-outline-primary">Login</button>
                    <a href="../pembeli/tambah.php"><p>Belum Punya akun?</p></a>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>


