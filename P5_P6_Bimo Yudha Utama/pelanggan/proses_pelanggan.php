<?php
//memanggil koneksi
require_once '../dbkoneksi.php';

$Kode = $_POST['kode'];
$Nama = $_POST['nama'];
$Jenis_Kelamin = $_POST['jk'];
$Tempat_lahir = $_POST['tmp_lahir'];
$Tanggal_lahir = $_POST['tgl_lahir'];
$Email = $_POST['email'];
$Kartu_id = $_POST['kartu_id'];
$Proses = $_POST['proses'];


// array data
$ar_data[] = $Kode; // ? 1
$ar_data[] = $Nama; // ? 2
$ar_data[] = $Jenis_Kelamin; // 3
$ar_data[] = $Tempat_lahir;
$ar_data[] = $Tanggal_lahir;
$ar_data[] = $Email;
$ar_data[] = $Kartu_id; // ? 7

if ($Proses == "Simpan") {
    //data baru
    $sql = "INSERT INTO pelanggan (kode,nama,jk,tmp_lahir,tgl_lahir,
    email,kartu_id) VALUES (?,?,?,?,?,?,?)";
} else if ($Proses == "Update") {
    $ar_data[] = $_POST['id']; // ? 8
    $sql = "UPDATE pelanggan SET kode=?,nama=?,jk=?,tmp_lahir=?,
    tgl_lahir=?,email=?,kartu_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:../app.php?page=pelanggan');
?>





?>