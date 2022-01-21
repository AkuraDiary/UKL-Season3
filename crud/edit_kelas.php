<?php
require_once("../misc/require.php");
require "../utils/connect.php";
$id = $_GET['id'];
$kelas = mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/mengukl/Styles/table.css">
    <meta charset="UTF-8">
    <title>Edit data Kelas</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("../misc/header.php"); ?>
    <div class="all-table">
    <!-- Konten -->
    <h3>Edit data Kelas</h3>
<?php
while($row = mysqli_fetch_assoc($kelas)){?>
    <form action="" method="POST">
        <table class="table table-striped table-dark" cellspacing="0" cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
            <tr>
                <td>Nama Kelas :</td>
                <td><input class="form-control" type="text" name="nama" value="<?= $row['nama_kelas']; ?>"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian :</td>
                <td><input class="form-control" type="text" name="kk" value="<?= $row['jurusan']; ?>"></td>
            </tr>
            <tr>
                <td>Angkatan :</td>
                <td><input class="form-control" type="number" name="angkatan" value="<?= $row['angkatan']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button class="btn btn-outline-secondary" type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
<?php } ?>
    </div>
    <!-- Panggil footer -->
    <?php $Footerpath = $_SERVER['DOCUMENT_ROOT'];
    $Footerpath .= "/mengukl/misc/footer.php"; 
    require($Footerpath);?>
</body>
</html>
<?php
// Proses update
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $angkatan = $_POST['angkatan'];
    $update = mysqli_query($connect, "UPDATE kelas SET nama_kelas='$nama', jurusan='$kk', angkatan = $angkatan
                                 WHERE kelas.id_kelas='$id'");
        if($update){
            echo "<script>alert('Data Berhasil Diubah !');location.href='kelas.php';</script>";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>