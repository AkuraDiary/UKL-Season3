<!-- ADMIN DAPAT MENGAKSES SEMUANYA -->
<html>
    <head>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/mengukl/Styles/header.css">        
        
    </head>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/mengukl/utils/connect.php";
    include($path);
    $panggil = mysqli_query($connect, "SELECT * FROM petugas WHERE username='$username'");
    $hasil = mysqli_fetch_assoc($panggil);    
    ?>
    
    <nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <?php
      if($hasil['level'] == "admin"){ 
      ?>
      <li class="nav-item active">
        <a class="nav-link nav-link-active" href="/mengukl/index.php">Home</a>
      </li>
      <li class="nav-item">        
        <a class="nav-link" href="/mengukl/crud/siswa.php">Data Siswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/crud/petugas.php">Data Petugas</a> 
      </li>
      <li class="nav-item">
      <a class="nav-link" href="/mengukl/crud/kelas.php">Data Kelas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/transaction/spp.php">Data SPP</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/transaction/transaksi.php">Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/misc/history.php">History Pembayaran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link logout" href="/mengukl/login-logout/logout.php">LogOut</a>
      </li>    
      <?php
        }else { ?>
      <li class="nav-item active">
        <a class="nav-link nav-link-active" href="/mengukl/index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/transaction/transaksi.php">Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/misc/history.php">History Pembayaran</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mengukl/login-logout/logout.php">LogOut</a>
      </li>
    </ul>
    <?php } ?>
  </div>
</nav>
</html>