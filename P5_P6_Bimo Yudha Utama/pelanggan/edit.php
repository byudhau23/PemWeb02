<?php
require_once 'dbkoneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM pelanggan WHERE id = ?";
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
            Edit Data Pelanggan
        </h2>
        <br>
        <form action="pelanggan/proses_pelanggan.php" method="POST">
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
                <label for="nama" class="col-4 col-form-label">Nama</label>
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
                <label class="col-4">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jk" id="jk_0" type="radio" class="custom-control-input" value="L" <?= $hasil['jk'] == 'L' ? 'checked' : '' ?>>
                        <label for="jk_0" class="custom-control-label">Laki-Laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jk" id="jk_1" type="radio" class="custom-control-input" value="P" <?= $hasil['jk'] == 'P' ? 'checked' : '' ?>>
                        <label for="jk_1" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card-o"></i>
                            </div>
                        </div>
                        <input id="tmp_lahir" name="tmp_lahir" placeholder="Masukan Tempat Lahir " type="text" class="form-control" required="required" value="<?php echo $hasil['tmp_lahir']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-align-right"></i>
                            </div>
                        </div>
                        <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?php echo $hasil['tgl_lahir']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                        <input id="email" name="email" placeholder="Massukan Email Anda" type="text" class="form-control" value="<?php echo $hasil['email']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="id_kartu" class="col-4 col-form-label">Kartu</label>
                <div class="col-8">
                    <?php
                    $sqljenis = "SELECT * FROM kartu";
                    $rsjenis = $dbh->query($sqljenis);
                    ?>
                    <select id="kartu_id" name="kartu_id" class="custom-select" value="" <?php foreach ($rsjenis as $rowjenis) {
                                                                                            ?> <option value="<?= $rowjenis['id'] ?>" <?php if ($hasil['kartu_id'] == $rowjenis['id']) {
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