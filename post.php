<?php
include('db.php'); // koneksi database

// Ambil id dari URL
$id = $_GET['id'];

// Query untuk mengambil artikel berdasarkan id
$query = "SELECT * FROM posts WHERE id = $id"; // ganti dengan nama tabel dan field yang sesuai
$result = mysqli_query($conn, $query);

// Cek apakah ada artikel yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Ambil data artikel
    $post = mysqli_fetch_assoc($result);
} else {
    echo "Artikel tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?php echo htmlspecialchars($post['title']); ?> - Blog</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <!-- Navigation links -->
        </div>
    </nav>

    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1><?php echo htmlspecialchars($post['title']); ?></h1>
                        <span class="meta">
                            Posted by <a href="#!"><?php echo htmlspecialchars($post['author']); ?></a> on <?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <!-- Jika ada gambar, bisa ditambahkan di sini -->
                    <?php if (!empty($post['image'])): ?>
                        <img src="assets/img/<?php echo htmlspecialchars($post['image']); ?>" class="img-fluid" alt="Post Image">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <!-- Social media links -->
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2023</div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/scripts.js"></script>
</body>
</html>
