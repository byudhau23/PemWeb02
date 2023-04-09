<?php
//memanggil koneksi
require_once '../dbkoneksi.php';
$Nomor = $_POST['nomor'];
$Nama = $_POST['nama'];
$Kota = $_POST['kota'];
$Kontak = $_POST['kontak'];
$Proses = $_POST['proses'];


// array data
$ar_data[] = $Nomor; // ? 1
$ar_data[] = $Nama; // ? 2
$ar_data[] = $Kota; // 3
$ar_data[] = $Kontak; // ? 7

if ($Proses == "Simpan") {
    //data baru
    $sql = "INSERT INTO vendor (nomor,nama,kota,kontak) 
    VALUES (?,?,?,?)";
} else if ($Proses == "Update") {
    $ar_data[] = $_POST['id']; // ? 8
    $sql = "UPDATE vendor SET nomor=?,nama=?,kota=?,kontak=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
 }
 header('location:../app.php?page=vendor');
?>





?>