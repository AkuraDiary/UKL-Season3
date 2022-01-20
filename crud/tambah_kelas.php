<?php
require_once("../misc/require.php");
require "../utils/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/mengukl/Styles/table.css">
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("../misc/header.php"); ?>
    <!-- Konten -->
    <div class="all-table">  
    <h3>Tambah Kelas</h3>
    <form action="" method="POST">
        <!--center the table-->
        <table  class="table table-striped table-dark" cellpadding="5">
            <tr>
                <td>Nama Kelas :</td>
                <td><input class="form-control" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian :</td>
                <td><input class="form-control" type="text" name="kk"></td>
            </tr>
            <tr>
                <td>Angkatan :</td>
                <td><input class="form-control" type="number" name="angkatan"></td>
            </tr>
            <tr>
                <td colspan="2"><button class="btn btn-outline-secondary" type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>
            <!-- Panggil footer -->
    <?php require("../misc/footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $angkatan = $_POST['angkatan'];
    $simpan = mysqli_query($connect, "INSERT INTO kelas VALUES(NULL, '$nama', '$kk', $angkatan)");
        if($simpan){
            header("location: kelas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>