<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT produk.*,jenis_produk.nama as jenis_produk
FROM produk LEFT JOIN 
jenis_produk ON produk.jenis_produk_id WHERE produk.id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();

?>

<table>
    <tr>
        <td>Kode:</td>
        <td><?= $hasil['kode'] ?></td>
    </tr>
    <tr>
        <td>Nama:</td>
        <td><?= $hasil['nama'] ?></td>
    </tr>
    <tr>
        <td>Harga Beli:</td>
        <td><?= $hasil['harga_beli'] ?></td>
    </tr>
    <tr>
        <td>Harga Jual :</td>
        <td><?= $hasil['harga_jual'] ?></td>
    </tr>
    <tr>
        <td>Stok :</td>
        <td><?= $hasil['stok'] ?></td>
    </tr>
    <tr>
        <td>Minimal Stok :</td>
        <td><?= $hasil['min_stok'] ?></td>
    </tr>
    <tr>
        <td>Jenis Produk :</td>
        <td><?= $hasil['jenis_produk'] ?></td>
    </tr>
</table>