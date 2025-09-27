<?php

class User{
    public $name;
    public $age;

    public function show() {
        return $this->cape($this->name);
    }
    public function cape($str) {
        return "42, {$str}!";
    }

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$user1 = new User('Orelov', 32);
echo $user1->show();

?>