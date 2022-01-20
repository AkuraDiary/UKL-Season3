<?php
require_once("../misc/require.php");
require "../utils/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/mengukl/Styles/table.css">
    <meta charset="UTF-8">
    <title>CRUD Data Kelas</title>
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("../misc/header.php"); ?>
    <div class="all-table">
        <!-- Isi Konten -->
    <h3>Kelas</h3>
    <p><a href="tambah_kelas.php"><button type="button" class="btn btn-outline-secondary">Tambah Data Kelas</button></a></p>
    <table class="table table-striped table-dark" cellspacing="0" border="1" cellpadding="5">
        <tr>
            <td>No. </td>
            <td>Nama Kelas</td>
            <td>Kompetensi Keahlian</td>
            <td>Angkatan</td>
            <td>Aksi</td>
        </tr>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($connect, "SELECT * FROM kelas");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel kelas
$sql = mysqli_query($connect, "SELECT * FROM kelas ORDER BY nama_kelas LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_kelas']; ?></td>
            <td><?= $r['jurusan']; ?></td>
            <td><?= $r['angkatan']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_kelas']; ?>">Hapus</a> | 
                <a href="edit_kelas.php?id=<?= $r['id_kelas']; ?>">Edit</a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<div class="table-number">
<?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>
</div>
<!-- Selesai -->
    </div>
    <!-- Panggil footer -->
    <?php require_once("../misc/footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($connect, "DELETE FROM kelas WHERE id_kelas='$id'");
    if($hapus){
        header("location: kelas.php");
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>