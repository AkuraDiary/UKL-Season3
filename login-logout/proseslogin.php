<?php
session_start();
require_once("../utils/connect.php");
// Kita akan membuat proses login nya disini
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPass = md5($password);
    $query = "SELECT * FROM petugas WHERE username='$username' AND password='$hashedPass'";
    $cari = mysqli_query($connect, $query);
    $hasil = mysqli_fetch_assoc($cari);
        // Jika data yang dicari kosong
        if(mysqli_num_rows($cari) == 0){
            echo "<center>Username belum terdaftar! <a href='../login-logout/login.php'>Kembali!</a></center>";
        }else{
            // Jika password tidak sesuai dengan yang ada di database
            if($hasil['password'] <> $hashedPass){
                echo "<center>Password salah! <a href='../login-logout/login.php'>Kembali!</a></center>";
            }else{
                // Jika user sesuai dengan database maka akan redirect ke halaman utama dan akan dibuatkan sesi
                $_SESSION['username'] = $_POST['username'];
                header("location: ./../index.php");
            }
        }
}
?>