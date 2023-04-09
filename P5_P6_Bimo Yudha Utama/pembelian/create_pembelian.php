<?php
require_once 'dbkoneksi.php';
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
        <h2>Form Pembelian</h2>
        <br>
<form action="pembelian/proses_pembelian.php" method="POST">  
  <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adn"></i>
          </div>
        </div> 
        <input id="tanggal" name="tanggal" type="date" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nomor</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-book"></i>
          </div>
        </div> 
        <input id="nomor" name="nomor" placeholder="Masukan Nomor Anda" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="id_kartu" class="col-4 col-form-label">Nama Produk </label> 
    <div class="col-8">
    <?php 
            $sqljenis = "SELECT * FROM produk";
            $rsjenis = $dbh->query($sqljenis);
        ?>
            <select id="produk_id" name="produk_id" class="custom-select">
                <?php 
            foreach($rsjenis as $rowjenis){
         ?>
                <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama']?></option>
                <?php
            }
        ?>

            </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="tgl_lahir" class="col-4 col-form-label">Jumlah</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-align-right"></i>
          </div>
        </div> 
        <input id="jumlah" name="jumlah" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Harga</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          </div>
        </div> 
        <input id="harga" name="harga"  type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="id_kartu" class="col-4 col-form-label">Nama Vendor</label>
    <div class="col-8">
    <?php 
            $sqljenis = "SELECT * FROM vendor";
            $rsjenis = $dbh->query($sqljenis);
        ?>
            <select id="vendor_id" name="vendor_id" class="custom-select">
                <?php 
            foreach($rsjenis as $rowjenis){
         ?>
                <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama']?></option>
                <?php
            }
        ?>

            </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
    </div>
  </div>
</form>
</div>
 
</body>

</html>