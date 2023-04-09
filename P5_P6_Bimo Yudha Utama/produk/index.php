<?php
require_once 'dbkoneksi.php';
?>
<?php
$sql = "select produk.*,jenis_produk.nama as jenis_produk
FROM produk LEFT JOIN 
jenis_produk ON produk.jenis_produk_id = jenis_produk.id";

$rs = $dbh->query($sql);
?>

<div class="container-fluid">
    <a href="app.php?page=TambahDataProduk" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Minimal Stok</th>
                        <th scope="col">Jenis Produk</th>
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
                            <td><?= $r['harga_beli'] ?></td>
                            <td><?= $r['harga_jual'] ?></td>
                            <td><?= $r['stok'] ?></td>
                            <td><?= $r['min_stok'] ?></td>
                            <td><?= $r['jenis_produk'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="app.php?page=viewProduk&id=<?= $r['id'] ?>">View</a>
                                <a class="btn btn-primary" href="app.php?page=editProduk&id=<?= $r['id'] ?>">Edit</a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="produk/delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
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