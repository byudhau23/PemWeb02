<?php
if(isset($_POST['submit'])) {
    $nim= $_POST['nim'];
    $nama= $_POST['nama'];
    $gender= $_POST['gender'];
    $prodi= $_POST['prodi'];
    $skills= $_POST['skill'];
    $alamat= $_POST['alamat'];
    $email= $_POST['email'];
    
    echo "NIM: $nim";
    echo "<br> Nama: $nama";
    echo "<br> Jenis Kelamin: $gender";
    echo "<br> Program Studi: $prodi";
    echo "<br> Skill Programming: ";
    foreach($skills as $s) {
        echo $s . ", ";
    }
    echo "<br> Alamat: $alamat";
    echo "<br> Email: $email";
} else{
    echo" Data belum dimasukan, Silahkan masukan dulu melalui Form Daftar <a href='form_registrasi.php'>disini.</a>";
}

?>