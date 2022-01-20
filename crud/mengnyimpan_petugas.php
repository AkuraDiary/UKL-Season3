<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/mengukl/utils/connect.php";
require($path);
// Proses Simpan
$user = $_POST['user'];
$pass = $_POST['pass'];
$nama = $_POST['nama'];

//check if data is empty or not
if(empty($user) || empty($pass) || empty($nama)){
    echo "<script>alert('Data tidak boleh kosong !');location.href='tambah_petugas.php';</script>";
}else{
    $hashedPass = md5($pass);
    $query = "INSERT INTO petugas VALUES(NULL, '$user', '$hashedPass', '$nama', 'petugas')";
    $simpan = mysqli_query($connect, $query);
    $num = mysqli_affected_rows($connect);

    if($num > 0){
        echo "<script>alert('Data tersimpan !');location.href='petugas.php'</script>";
    }else{
        $error = mysqli_error($connect);
        echo $error;
        //echo "<script>alert('Data gagal disimpan : '$error' !');location.href='tambah_petugas.php'</script>";
    }
    
    /*if($simpan){
        echo "<script>alert('Data tersimpan !');location.href='petugas.php'</script>";
    }elseif(empty($_POST['simpan'])){
        echo "<script>alert('$simpan');</script>";
        echo "<script>alert('Data kosong !');location.href='petugas.php';</script>";
    }else{
        echo "<script>alert('Data sudah ada');location.href='petugas.php';</script>";
    }*/
}

?>