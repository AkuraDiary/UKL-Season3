<?php
session_start();

$Connectpath = $_SERVER['DOCUMENT_ROOT'];
$Connectpath .= "/mengukl/utils/connect.php";
require($Connectpath);
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['nisn'])){
    header("location: ./login-logout/login_siswa.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($connect, "SELECT * FROM siswa 
JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
WHERE nisn='$nisn'");

$result = mysqli_fetch_assoc($siswa);

$pembayaran = mysqli_query($connect, "SELECT * FROM pembayaran 
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn'
ORDER BY tgl_bayar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./Styles/header.css">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/mengukl/Styles/table.css">
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
</head>
<body>
<div class="all-table"> 
    <h2> <img src="Assets/wallpaper.png" alt="pp" style="border-radius: 50%;" width="50px" height="50px"> Hallo, <?= $result['nama']; ?></h2>
    <button class="btn btn-outline-secondary " name="logout"><a href="/mengukl/login-logout/logout.php">Logout</a></button>
    <h3>Biodata Dan History </h3>
    <table class="table table-striped table-dark" cellpadding="5" id="biodata">
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><?= $result['nisn']; ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= $result['nis']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $result['nama']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $result['nama_kelas'] . " | " . $result['jurusan']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $result['alamat']; ?></td>
        </tr>
    </table>
            <hr />
    <h3>History Pembayaran Kamu</h3>
    <table class="table table-striped table-dark" id="history" cellpadding="5">
        <tr>
            <td>No. </td>
            <td>Dibayarkan kepada</td>
            <td>Tgl. Pembayaran</td>
            <td>Tahun | Nominal yang harus dibayar</td>
            <td>Jumlah yang dibayarkan</td>
            <td>Status</td>
        </tr>
<?php
$no = 1;
while($r = mysqli_fetch_assoc($pembayaran)){ ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: green; font-weight: bold;">LUNAS</font>
<?php }else{ ?>                             BELUM LUNAS <?php } ?> </td>
    <?php $no++; } ?>
    </table>
</div>
    <?php $Footerpath = $_SERVER['DOCUMENT_ROOT'];
    $Footerpath .= "/mengukl/misc/footer.php"; 
    require($Footerpath); ?>
</body>
</html>