 <?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
      // ambil nilai id dari url dan disimpan dalam variabel $id
      $id = ($_GET["id"]);

      // menampilkan data dari database yang mempunyai id=$id
      $sql = "SELECT * FROM barang WHERE id='$id'";
      $query = mysqli_query($koneksi, $sql);
      // jika data gagal diambil maka akan tampil error berikut
      if (!$result) {
          die("Query Error: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
      }
      // mengambil data dari database
      $data = mysqli_fetch_assoc($query);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
      if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
      }
  } else {
      // apabila tidak ada data GET id pada akan di redirect ke index.php
      echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>

  <div class="container-fluid">
  <div class="card-group">
  <div class="card">

    <div class="card-body">

    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h1 align="center" class="alert alert-info">Edit Data</h1>
      
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"/>

        <div>
          <label>Nama Barang</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
        </div>
<br>
        <div>
          <label>Harga sewa</label>
         <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" />
        </div>
        <br>
        <div>
          <label>Foto</label><br>
          <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 240px; float: left; margin-bottom: 5px;">
          <input type="file" name="gambar" class="form-control" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
<br>
        <div style="float: right;">
         <button type="submit" class="btn btn-primary">Simpan</button>
         <a href="index.php" class="btn btn-danger">Batal</a>
        </div>
        </section>
      </form>
    </div>
  </div>
  <div class="card">
    <div class="card-body">

    </div>
  </div>
</div>
  </div>

  </body>
</html>