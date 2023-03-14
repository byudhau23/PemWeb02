<?php
if(isset($_POST['submit'])) {
    $nim= $_POST['nim'];
    $nama= $_POST['nama'];
    $gender= $_POST['gender'];
    $prodi= $_POST['prodi'];
    $skills= $_POST['skill'];
    $alamat= $_POST['alamat'];
    $email= $_POST['email'];

    function skor_skill($skills)
    {
        $skill_list = [
          'HTML' => 10,
          'CSS' => 10,
          'Java Script' => 20,
          'RWD Bootstrap' => 20,
          'PHP' => 30,
          'Python' => 30,
          'Java' => 50 
        ];
        $result = 0;
        
        foreach ($skills as $skill) {
            $result = $result + $skill_list[$skill];
        }

        return $result;
    }
    
    function kategori_skill($skills)
    {
        $skill_list = [
          'HTML' => 10,
          'CSS' => 10,
          'Java Script' => 20,
          'RWD Bootstrap' => 20,
          'PHP' => 30,
          'Python' => 30,
          'Java' => 50 
        ];
        $result = 0;
        
        foreach ($skills as $skill) {
            $result = $result + $skill_list[$skill];
        }

        switch ($result) {
            case ($result >= 100 && $result <= 170):
                $result = 'Sangat Baik';
                break;
            case ($result >= 60 && $result <= 99):
                    $result = 'Baik';
                    break;    
            case ($result >= 40 && $result <= 59):
                    $result = 'Cukup';
                    break;
            case ($result >= 0 && $result <= 39):
                    $result = 'Kurang';
                    break;
            default:
                $result = "Tidak Memadai";
                break;
        }

        return $result;
    }

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
    echo "<br> Skor Skill: " . skor_skill($skills);
    echo "<br> Kategori Skill: " . kategori_skill($skills);
} else{
    echo" Data belum dimasukan, Silahkan masukan dulu melalui Form Daftar <a href='form_registrasi.php'>disini.</a>";
}

?>