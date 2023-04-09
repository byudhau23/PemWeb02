<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT pelanggan.*,kartu.nama as kartu_nama
FROM pelanggan LEFT JOIN 
kartu ON pelanggan.kartu_id = kartu.id WHERE pelanggan.id = ?";
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
        <td>Jenis Kelamin :</td>
        <td><?= $hasil['jk'] ?></td>
    </tr>
    <tr>
        <td>Tempat Lahir :</td>
        <td><?= $hasil['tgl_lahir'] ?></td>
    </tr>
    <tr>
        <td>Email :</td>
        <td><?= $hasil['email'] ?></td>
    </tr>
    <tr>
        <td>Kartu :</td>
        <td><?= $hasil['kartu_nama'] ?></td>
    </tr>
</table>