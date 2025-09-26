<?php

// int, float, string, null, array, boolean, resource, object, self, this

// function getSum(int $num1, int $num2){
//     return $num1 + $num2;
// }

// echo getSum('42', "as");

// class abstract GreatApes()

abstract class Animal{
    private float $weight;
    private float $height;
    private int $age;
    public string $name;

    public function getName(){
        return $this->name;
    }
    public function setName(string $new_name){
        $this->name = $new_name;
    }
}

abstract class Ape extends Animal{
    public string $tribe;

    public function callToFeast(){
        return "{$this->name} calls to feast tonight.";
    }
}

abstract class Feline extends Animal{
    public int $teeth_size;

    public function toHiss(){
        return "{$this->name} hisses!";
    }
}

class Chimpanzee extends Ape{
    public string $weapon;

    public function toArm(string $new_weapon){
        $this->weapon = $new_weapon;
        return "{$this->name} arms with {$new_weapon}";
    }
    public function toHunt(string $prey){
        return "{$this->name} hunts {$prey}.";
    }
}

class DomesticCat extends Feline{
    public int $house_num;

    public function toPlay(string $toy){
        return "{$this->name} plays with {$toy}.";
    }
}

abstract class WildCat extends Feline{
    
}

class Lion extends WildCat{
    public $pride;

    public function newPride(string $pride_name){
        return "{$this->name} organizes a new tribe named {$pride_name}.";
    }
}

$chimp1 = new Chimpanzee;
$chimp1->name = 'Kusak';

echo $chimp1->toHunt('antilope');

?>