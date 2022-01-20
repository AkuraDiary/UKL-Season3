<?php
require_once("../misc/require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="./Styles/table.css">
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require_once("../utils/connect.php"); ?>
    <?php require("../misc/header.php"); ?>
    <div class="all-table">  
    <!-- Konten -->
    <h3>Tambah Siswa</h3>
    <form action="" method="POST">
        <table class="table table-striped table-dark" cellpadding="5">
            <tr>
                <td>NISN :</td>
                <td><input class="form-control" type="text" name="nisn"></td>
            </tr>
            <tr>
                <td>NIS :</td>
                <td><input class="form-control" type="text" name="nis"></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><input class="form-control" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kelas :</td>
                <td>
                <div class="select">
                    <select class="custom-select" id="inlineFormCustomSelectPref" name="kelas">
                        <?php
                        $kelas = mysqli_query($connect, "SELECT * FROM kelas");
                        while($r = mysqli_fetch_assoc($kelas)){ ?>
                            <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                            . $r['kompetensi_keahlian']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </td>
            </tr>
            <tr>
                <td>Alamat :</td>
                <td><input class="form-control" type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>No. Telp :</td>
                <td><input class="form-control" type="tel" name="no"></td>
            </tr>
            <tr>
                <td colspan="2"><button class="btn btn-outline-secondary" type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
</div>
<hr />
            <!-- Panggil footer -->
    <?php require("../misc/footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $simpan = mysqli_query($connect, "INSERT INTO siswa VALUES
    ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no')");
        if($simpan){
            header("location: siswa.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>