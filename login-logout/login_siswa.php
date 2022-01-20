<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/mengukl/utils/connect.php";
require_once($path);
if(isset($_SESSION['nisn'])){
    header("location: ../index_siswa.php");
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/mengukl/Styles/login.css">
        <title>LOG IN</title>
    </head>
<body>
<center>
    <h1>Silahkan Login</h1>
            <hr />
<form action="" method="POST">
    <table>
        <tr>
<?php
// Kita akan membuat proses login nya disini
if(isset($_POST['login'])){
    $nisn = $_POST['nisn'];
    $cari = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn='$nisn'");
    $hasil = mysqli_fetch_assoc($cari);
        // Jika data yang dicari kosong
        if(mysqli_num_rows($cari) == 0){
            echo "<td colspan='2'><center>NISN belum terdaftar!</center></td>";
        }else{
        // Jika nisn siswa sesuai dengan database maka akan redirect ke halaman utama dan akan dibuatkan sesi
            $_SESSION['nisn'] = $_POST['nisn'];
            header("location: ../index_siswa.php");
        }
}
?>
        <tr>
            <td>NISN :</td>
            <td><input type="text" name="nisn"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="LOG IN" name="login"></td>
        </tr>
        <tr>
            <td colspan="2"><center>Apakah anda seorang petugas? login 
                                    <a href="/mengukl/login-logout/login.php">disini</a>
                            </center>
            </td>
        </tr>
    </table>
</form>
</center>
</body>

</html>