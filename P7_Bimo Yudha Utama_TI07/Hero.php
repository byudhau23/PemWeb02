<?php 
class Hero{
    // Atribut / Properties pada class
    public $name;
    public $health;
    public $damage;
    public $level = 1;

    // Constractor akan dijalankan secara otomatis
    public function __construct($name, $health, $damage)
    {
        $this -> name = $name;
        $this -> health = $health;
        $this -> damage = $damage;
    }
    // Method untuk menampilkan informasi hero
    public function getInfo(){
        echo "Nama Hero: " . $this->name;
        echo "<br> Level: " . $this->level;
        echo "<br> HP: " . $this->health;
        echo "<br> Damage: " . $this->damage;
    }
    public function LevelUp(){
        $this->level += 1;
    }
}

// Membuat Objek dari Class Hero
$hero1 = new Hero('Alucard', 3200, 200);
$hero2 = new Hero('Franco', 5000, 50);

//Memanggil Method
$hero1->getInfo();

echo "<br> <hr>";

$hero1->LevelUp();
$hero1->getInfo();
?>