<?php
$majors = [
  'SI' => 'Sistem Informasi',
  'TI' => 'Teknik Informatika',
  'BD' => 'Bisnis Digital' 
];
$skills = [
  'HTML' => 10,
  'CSS' => 10,
  'JavaScript' => 20,
  'RWD Bootstrap' => 20,
  'PHP' => 30,
  'Python' => 30,
  'JAVA'=> 50
];
$tempat = ['Jakarta','Depok','Bogor','Tanggerang','Bekasi','Medan','Aceh'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Form Registrasi</title>
</head>

<body>
    <div class="container m-5">
        <h2>Form Registrasi IT Club</h2>
        <hr>

        <form method="post" action="proses_registrasi.php">
            <div class="form-group row">
                <label for="nim" class="col-4 col-form-label">NIM</label>
                <div class="col-8">
                    <input id="nim" name="nim" placeholder="Masukan NIM" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input id="nama" name="nama" placeholder="Masukan Nama" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="Laki-laki">
                        <label for="gender_0" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="Perempuan">
                        <label for="gender_1" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="prodi" class="col-4 col-form-label">Program Studi</label>
                <div class="col-8">
                    <select id="prodi" name="prodi" class="custom-select" required="required">
                        <?php
                        foreach($majors as $m => $v){
                          echo '<option value"'.$m.'">'.$v.'</option>';
                        };
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Skill Programming</label>
                <div class="col-8">
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <?php
                        foreach($skills as $s => $v){
                          echo '<input class="mr-2 ml-2" type="checkbox" name="skill[]" value="'.$s.'">'.$s;
                        };
                        ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <select id="alamat" name="alamat" class="custom-select" required="required">
                        <?php
                        foreach($tempat as $t => $v){
                          echo '<option value"'.$t.'">'.$v.'</option>';
                        };
                        ?>
                    </select>
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
                        <input id="email" name="email" placeholder="Masukan Email" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>