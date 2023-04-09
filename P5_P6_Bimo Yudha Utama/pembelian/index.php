<?php
require_once 'dbkoneksi.php';
?>
<?php
$sql = "SELECT 
pembelian.id,
pembelian.tanggal,
pembelian.nomor,
produk.nama as  nama_produk,
pembelian.jumlah,
pembelian.harga,
vendor.nama as nama_vendor
FROM pembelian
INNER JOIN produk ON produk.id = pembelian.produk_id
INNER JOIN vendor ON vendor.id = pembelian.vendor_id
";

$rs = $dbh->query($sql);
?>

<div class="container-fluid">
    <a href="app.php?page=TambahDataPembelian" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Nama Vendor</th>
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
                            <td><?= $r['tanggal'] ?></td>
                            <td><?= $r['nomor'] ?></td>
                            <td><?= $r['nama_produk'] ?></td>
                            <td><?= $r['jumlah'] ?></td>
                            <td><?= $r['harga'] ?></td>
                            <td><?= $r['nama_vendor'] ?></td>
                            <td>
                             <a class="btn btn-primary" href="app.php?page=viewPembelian&id=<?= $r['id'] ?>">View</a>
                                <a class="btn btn-primary" href="app.php?page=editPembelian&id=<?= $r['id'] ?>">Edit</a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="pembelian/delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-md">
                                    <span class="fa fa-trash"></span>
                                </a>
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