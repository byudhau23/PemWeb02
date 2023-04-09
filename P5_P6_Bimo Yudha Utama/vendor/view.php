<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM vendor WHERE  id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();

?>

<table>
    <tr>
        <td>Nomor:</td>
        <td><?= $hasil['nomor'] ?></td>
    </tr>
    <tr>
        <td>Nama:</td>
        <td><?= $hasil['nama'] ?></td>
    </tr>
    <tr>
        <td>Kota:</td>
        <td><?= $hasil['kota'] ?></td>
    </tr>
    <tr>
        <td>Kontak:</td>
        <td><?= $hasil['kontak'] ?></td>
    </tr>
</table>