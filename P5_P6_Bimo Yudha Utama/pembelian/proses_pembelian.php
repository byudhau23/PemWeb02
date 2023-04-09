<?php
require_once '../dbkoneksi.php';
?>
<?php
$_Tanggal = $_POST['tanggal'];
$_Nomor = $_POST['nomor'];
$_Produk = $_POST['produk_id'];
$_Jumlah = $_POST['jumlah'];
$_Harga = $_POST['harga'];
$_Vendor = $_POST['vendor_id'];

$_proses = $_POST['proses'];

// array data
$ar_data[] = $_Tanggal; // ? 1
$ar_data[] = $_Nomor; // ? 2
$ar_data[] = $_Produk; // 3
$ar_data[] =  $_Jumlah;
$ar_data[] = $_Harga;
$ar_data[] = $_Vendor;

if ($_proses == "Simpan") {
   // data baru
   $sql = "INSERT INTO pembelian (tanggal,nomor,produk_id,jumlah,harga,vendor_id)
    VALUES (?,?,?,?,?,?)";
} else if ($_proses == "Update") {
   $ar_data[] = $_POST['id']; // ? 8
   $sql = "UPDATE pembelian SET tanggal=?,nomor=?,produk_id=?,jumlah=?,
    harga=?,vendor_id=? WHERE id=?";
}
if (isset($sql)) {
   $st = $dbh->prepare($sql);
   $st->execute($ar_data);
}
header('location:../app.php?page=pembelian');
?>