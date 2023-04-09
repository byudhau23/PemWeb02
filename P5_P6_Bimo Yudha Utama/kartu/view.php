<?php
require_once 'dbkoneksi.php';
?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM kartu WHERE  id = ?";
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
        <td>Diskon:</td>
        <td><?= $hasil['diskon'] ?></td>
    </tr>
    <tr>
        <td>Nama:</td>
        <td><?= $hasil['iuran'] ?></td>
    </tr>
</table>