<?php
require_once("../misc/require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    <meta charset="UTF-8">
    <title>History Pembayaran</title>
</head>
<body>
    <!-- Panggil header -->
    <?php require_once("../misc/header.php"); ?>
    <!-- Konten -->
    <h3>History Pembayaran Siswa</h3>
    <form action="" method="POST" autocomplete="off">
        Cari Siswa <input type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>

<?php
// Kita lakukan proses pencariannya disini
if(isset($_POST['cari'])){
    $nisn = $_POST['nisn'];
    // Kita panggil table siswa
    $biodataSiswa = mysqli_query($db, "SELECT * FROM siswa 
                    JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                    WHERE nisn='$nisn'");
    // Table pembayaran wajib kita panggil
    $historyPembayaran = mysqli_query($db, "SELECT * FROM pembayaran
                         JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                         JOIN spp ON pembayaran.id_spp=spp.id_spp
                         WHERE nisn='$nisn'
                         ORDER BY tgl_bayar");
    $r_siswa = mysqli_fetch_assoc($biodataSiswa);
?>
    <hr />
    <!-- Kita tampilkan Biodata Siswa -->
        <h3>Biodata Siswa</h3>
        <table cellpadding="5">
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><?= $r_siswa['nisn']; ?></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $r_siswa['nis']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $r_siswa['nama']; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $r_siswa['nama_kelas'] . " | " . $r_siswa['jurusan']; ?></td>
            </tr>
        </table>
        <hr />
        <!-- Sekarang kita tampilkan history pembayarannya -->
        <table cellpadding="5" cellspacing="0" border="1">
            <tr>
                <td>No. </td>
                <td>Tanggal Pembayaran</td>
                <td>Pembayaran Melalui</td>
                <td>Tahun SPP | Nominal yang harus dibayar</td>
                <td>Jumlah yang sudah dibayar</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
<?php 
$no=1;
while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r_trx['tgl_bayar'] . " " . $r_trx['bulan_dibayar'] . " " .
                        $r_trx['tahun_dibayar']; ?></td>
                <td><?= $r_trx['nama_petugas']; ?></td>
                <td><?= $r_trx['tahun'] . " | Rp. " . $r_trx['nominal']; ?></td>
                <td><?= "Rp. " . $r_trx['jumlah_bayar']; ?></td>
<?php
if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                <td>-</td>
<?php }else{ ?> <td>BELUM LUNAS</td>
                <td><a href="transaksi.php?lunas&id=<?= $r_trx['id_pembayaran']; ?>">
                BAYAR LUNAS</a></td>
<?php } ?>
            </tr>
<?php $no++; }?>
        </table>
<?php } ?>
    <hr />
    <!-- Panggil footer -->
    <?php require_once("footer.php"); ?>
</body>
</html>
