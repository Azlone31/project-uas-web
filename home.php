<!DOCTYPE html>
<html>
    <head>
    <title>Admin Rental</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    </head>

    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list_mobil.php">Mobil</a>
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


                    <h1 class="alert alert-info" align="center"> SELAMAT DATANG DI RENTAL COY </h1>

                    <div class="row mb-3">
                    <?php
        require 'koneksi.php';
        $sql ="SELECT * FROM barang";
        $query =mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_object($query)) {
            ?>
        <div class="col-sm-3"> 
            <div class="card">
                <img src="gambar/<?=$data->gambar; ?>" class="card-img-top" style="width: 18rem; border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title"><?=$data->nama; ?></h5>
                    <p class="card-text">Rp.<?=$data->harga; ?></p>
                <a href="#" class="btn btn-info">Rental</a>
                </div>
            </div>
        </div>
        <?php
        } ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    setInterval(myTimer, 1000);

    function myTimer() {
        const d = new Date();
        document.getElementById("jam").innerHTML = d.toLocaleTimeString();
    }
</script>
    </body>
</html>