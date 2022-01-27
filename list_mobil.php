<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
  <head>
    <title>List mobil</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>

   

    <div class="container">
      <div class="card">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="list_mobil.php">Mobil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="jam" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>
      <form class="d-flex">
       <a href="login.php" class="btn btn-primary">Login</a>
      </form>
    </div>
  </div>
</nav>


      <h1 align="center" class="alert alert-primary">Data Mobil</h1>
        <div class="card-body">
    <table class="table table-stripped table-bordered table-hover table-sm">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Barang</th>
          <th>Harga Sewa</th>
          <th>Gambar</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM barang ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if (!$result) {
          die("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mobil
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while ($data = mysqli_fetch_assoc($result)) {
          ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td>Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px; height: 120px;" ></td>
      </tr>
        </div>
      </div>
    </div>

      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>

    </tbody>
    </table>
  </body>
</html>
