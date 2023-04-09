<?php
require_once 'dbkoneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id = ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$hasil = $r->fetch();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Form Produk</title>
</head>

<body>
    <div class="container mt-5">
        <h2>
            Edit Data Produk
        </h2>
        <br>
        <form action="produk/proses_produk.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $hasil['id']; ?>">
            <div class="form-group row">
                <label for="kode" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-adn"></i>
                            </div>
                        </div>
                        <input id="kode" name="kode" placeholder="Massukan Kode Anda" type="text" class="form-control" required="required" value="<?php echo $hasil['kode']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                        <input id="nama" name="nama" placeholder="Massukan Nama Anda" type="text" class="form-control" required="required" value="<?php echo $hasil['nama']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Harga Beli</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                        <input id="harga_beli" name="harga_beli" placeholder="Massukan Harga Beli" type="text" class="form-control" required="required" value="<?php echo $hasil['harga_beli']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Stok</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-align-right"></i>
                            </div>
                        </div>
                        <input id="stok" name="stok" type="text" class="form-control" value="<?php echo $hasil['stok']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Minium Stok</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            </div>
                        </div>
                        <input id="min_stok" name="min_stok" type="text" class="form-control" value="<?php echo $hasil['min_stok'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis" class="col-4 col-form-label">Jenis Produk</label>
                <div class="col-8">
                    <?php
                    $sqljenis = "SELECT * FROM jenis_produk";
                    $rsjenis = $dbh->query($sqljenis);
                    ?>
                    <select id="jenis" name="jenis" class="custom-select" value="" <?php foreach ($rsjenis as $rowjenis) {
                                                                                    ?> <option value="<?= $rowjenis['id'] ?>" <?php if ($hasil['jenis_produk_id'] == $rowjenis['id']) {
                                                                                                                                    echo 'selected';
                                                                                                                                } ?>>
                        <?= $rowjenis['nama'] ?></option>
                    <?php
                                                                                    }
                    ?>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="proses" type="submit" class="btn btn-primary" value="Update">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>