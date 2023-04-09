<?php
require_once  'dbkoneksi.php';
?>
<?php
$sql = "SELECT * FROM kartu";

$cards = $dbh->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <a href="app.php?page=TambahDataKartu" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Iuran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($cards as $r) {
                    ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $r['kode'] ?></td>
                            <td><?= $r['nama'] ?></td>
                            <td><?= $r['diskon'] ?></td>
                            <td><?= $r['iuran'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="app.php?page=viewKartu&id=<?= $r['id'] ?>">View</a>
                                <a class="btn btn-primary" href="app.php?page=editKartu&id=<?= $r['id']; ?>">Edit</a>
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="kartu/delete.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
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
</body>
</html>
