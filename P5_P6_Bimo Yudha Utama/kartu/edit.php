<?php
require_once 'dbkoneksi.php';
?>
<?php

$id = $_GET['id'];
$sql = "SELECT * FROM kartu WHERE id =  ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
$cards = $r->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Form Edit  Kartu</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Form Kartu</h2>
        <br>
        <form action="kartu/proses_kartu.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cards['id']; ?>">
            <div class="form-group row">
                <label for="kode" class="col-4 col-form-label">Kode</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-adn"></i>
                            </div>
                        </div>
                        <input id="kode" name="kode" placeholder="Massukan Kode Anda" type="text" class="form-control" required="required" value="<?php echo $cards['kode']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama </label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                        <input id="nama" name="nama" placeholder="Massukan Nama Anda" type="text" class="form-control" required="required" value="<?php echo $cards['nama']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Diskon</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-book"></i>
                            </div>
                        </div>
                        <input id="diskon" name="diskon" placeholder="Massukan Harga Beli" type="number" class="form-control" required="required" value="<?php echo $cards['diskon']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Iuran</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-align-right"></i>
                            </div>
                        </div>
                        <input id="iuran" name="iuran" type="number" class="form-control" value="<?php echo $cards['iuran']; ?>">
                    </div>
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