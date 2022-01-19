<h1>Selamat datang di Aplikasi Pembayaran SPP</h1>
            <hr />
<!-- Logika kita, Jika Level Admin Maka Fitur apa saja yang dapat diakses -->
<?php
include "./utils/connect.php";
$panggil = mysqli_query($connect, "SELECT * FROM petugas WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
    if($hasil['level'] == "admin"){ ?>
    <a href="siswa.php">Data Siswa</a> | 
    <a href="petugas.php">Data Petugas</a> | 
    <a href="kelas.php">Data Kelas</a> | 
    <a href="spp.php">Data SPP</a> | 
    <a href="transaksi.php">Transaksi</a> | 
    <a href="history.php">History Pembayaran</a> | 
    <a href="./login-logout/logout.php">LogOut</a>
<?php
    }else{ ?>
    <a href="transaksi.php">Transaksi</a> | 
    <a href="history.php">History Pembayaran</a> | 
    <a href="./login-logout/logout.php">LogOut</a>
<?php } ?>
            <hr />