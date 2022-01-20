<?php
require_once("../misc/require.php");
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/mengukl/utils/connect.php";
require($path);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/mengukl/Styles/table.css">
    <title>CRUD Data Kelas</title>
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("../misc/header.php"); ?>
    <div class="all-table">
    <!-- Isi Konten -->
    <h3>Petugas</h3>
    <p><a href="tambah_petugas.php"><button type="button" class="btn btn-outline-secondary">Tambah Data</button></a></p>
    <table class="table table-striped table-dark" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <td>No. </td>
            <td>Username</td>
            <td>Password</td>
            <td>Nama Petugas</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>
<?php
// Kita buat konfigurasi pagging
$jmlhDataHal = 5;
$data = mysqli_query($connect, "SELECT * FROM petugas");
$jmlhData = mysqli_num_rows($data);
$jmlhHal = ceil($jmlhData / $jmlhDataHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($jmlhData * $halAktif) - $jmlhData;
// Konfigurasi Selesai
// Kita panggil tabel petugas
$sql = mysqli_query($connect, "SELECT * FROM petugas LIMIT $dataAwal, $jmlhDataHal");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['username']; ?></td>
            <td><?= $r['password']; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['level']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_petugas']; ?>">Hapus</a> | 
                <a href="edit_petugas.php?id=<?= $r['id_petugas']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>

<div class="table-number">
<!-- Sekarang kita buat tombol halamannya -->
<?php for($i=1; $i <= $jmlhHal; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>
</div>
<!-- Selesai -->
</div>
    <?php 
    $Footerpath = $_SERVER['DOCUMENT_ROOT'];
    $Footerpath .= "/mengukl/misc/footer.php"; 
    require($Footerpath); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($connect, "DELETE FROM petugas WHERE id_petugas='$id'");
    if($hapus){
        header("location: petugas.php");
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>