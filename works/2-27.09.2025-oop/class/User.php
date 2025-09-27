<?php

class User{
    public $name;
    public $age;
    public $email;

    public function show() {
        return $this->cape($this->name);
    }
    public function cape(string $str) {
        return "42, {$str}!";
    }
    public function setEmail(string $str) {
        $this->email = $str;
        echo "Email {$str} is set.";
    }
    public function dataDisplay() {
        echo $this->name;
        echo $this->age;
        echo $this->email;
    }

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

?>