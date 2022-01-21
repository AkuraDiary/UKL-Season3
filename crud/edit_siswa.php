<?php
require_once("../misc/require.php");

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/mengukl/utils/connect.php";
require($path);

$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data Siswa</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require("../misc/header.php"); ?>
    <!-- Konten -->
    <h3>Edit data Siswa</h3>
<?php
while($row = mysqli_fetch_assoc($siswa)){?>
    <form action="" method="POST">
        <table cellpadding="5">
            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama" value="<?= $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Kelas :</td>
                <td><select name="kelas">
<?php
$kelas = mysqli_query($db, "SELECT * FROM kelas");
while($r = mysqli_fetch_assoc($kelas)){ ?>
                        <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " 
                    . $r['jurusan']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Alamat :</td>
                <td><input type="text" name="alamat" value="<?= $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>No. Telp :</td>
                <td><input type="tel" name="no" value="<?= $row['no_telp']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
<?php } ?>
<hr />
    <!-- Panggil footer -->
    <?php 
    $Footerpath = $_SERVER['DOCUMENT_ROOT'];
    $Footerpath .= "/mengukl/misc/footer.php"; 
    require($Footerpath); ?>
</body>
</html>
<?php
// Proses update
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $update = mysqli_query($db, "UPDATE siswa SET nama='$nama',
                                 id_kelas='$kelas', alamat='$alamat', no_telp='$no' 
                                 WHERE siswa.nisn='$nisn'");
        if($update){
            header("location: siswa.php");
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>