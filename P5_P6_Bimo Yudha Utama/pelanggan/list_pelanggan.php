<?php
require_once 'dbkoneksi.php';
?>
<?php
$sql = "select pelanggan.*,kartu.nama as kartu_nama
FROM pelanggan LEFT JOIN 
kartu ON pelanggan.kartu_id = kartu.id";

$rs = $dbh->query($sql);
?>

<div class="container-fluid">
    <a href="app.php?page=TambahData" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Email</th>
                        <th scope="col">Kartu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $nomor = 0;
                    foreach ($rs as $r) {
                    ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $r['kode'] ?></td>
                            <td><?= $r['nama'] ?></td>
                            <td><?= $r['jk'] ?></td>
                            <td><?= $r['tmp_lahir'] ?></td>
                            <td><?= $r['tgl_lahir'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['kartu_nama'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="app.php?page=viewpelanggan&id=<?= $r['id'] ?>">View</a>
                                <a class="btn btn-primary" href="app.php?page=editpelanggan&id=<?= $r['id'] ?>">Edit</a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="pelanggan/delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php
                        $nomor++;
                    }
                    ?>
            </table>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>