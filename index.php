<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  session_start();

  if (!isset($_SESSION['login'])) {
      header('location: home.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Rental</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>

    </style>
  </head>

  <body>

   

    <div class="container">
      <div class="card">
        <h1 align="center" class="alert alert-primary">
          Selamat Datang : 
          <?php echo $_SESSION['fullname']; ?>

        </h1>
        <div class="card-body">
        
        <?php
          if ($_SESSION['role'] == 'admin') {
              ?>
            <a href="tambah_produk.php" class="btn btn-primary" style="float-left">+ &nbsp; Tambah data</a>
            <?php
          }
          ?>
        <a href="logout.php" class="btn btn-outline-danger float-end">Logout</a>
<br>
        <div class="row mb-5">
                    <?php
        require 'koneksi.php';
        $sql ="SELECT * FROM barang";
        $query =mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_object($query)) {
            ?>
        <div class="col-md-3 mb-3"> 
            <div class="card" style="width: 20rem; border-radius: 10px;">
                <img src="gambar/<?=$data->gambar; ?>" class="card-img-top" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title" ><?=$data->nama; ?></h5>
                    <p class="card-text">Rp.<?=$data->harga; ?></p>
                <a href="edit_produk.php" class="btn btn-warning">Edit</a>
                
                <?php
                  if ($_SESSION['role'] == 'admin') {
                      ?>
                  <a href="proses_hapus.php?=<?=$data->id ?>" class="btn btn-danger">
                    Hapus
                  </a>
                  <?php
                  } ?>
                </div>
            </div>
        </div>
        <?php
        } ?>
        </div>
      </div>
    </div>
<!-- <script src="bootstrap/js/marquee.js"></script> -->
  </body>
</html>
