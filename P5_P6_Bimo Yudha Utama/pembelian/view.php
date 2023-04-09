<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT 
pembelian.id,
pembelian.tanggal,
pembelian.nomor,
produk.nama as  nama_produk,
pembelian.jumlah,
pembelian.harga,
pembelian.vendor_id,
pembelian.produk_id,
vendor.nama as nama_vendor
FROM pembelian
INNER JOIN produk ON produk.id = pembelian.produk_id
INNER JOIN vendor ON vendor.id = pembelian.vendor_id WHERE pembelian.id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();

?>

<table>
    <tr>
        <td>Tanggal:</td>
        <td><?= $hasil['tanggal'] ?></td>
    </tr>
    <tr>
        <td>Nomor:</td>
        <td><?= $hasil['nomor'] ?></td>
    </tr>
    <tr>
        <td>Nama Produk:</td>
        <td><?= $hasil['nama_produk'] ?></td>
    </tr>
    <tr>
        <td>Jumlah :</td>
        <td><?= $hasil['jumlah'] ?></td>
    </tr>
    <tr>
        <td>Harga :</td>
        <td><?= $hasil['harga'] ?></td>
    </tr>
    <tr>
        <td>Nama Vendor :</td>
        <td><?= $hasil['nama_vendor'] ?></td>
    </tr>
</table>