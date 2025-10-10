<?php

class BankAccount {
    private float $balance;

    public function deposit(float $amount = 0) {
        if (0 > $amount) {
            return;
        }
        $this->balance += $amount;
    }
    public function withdraw(float $amount) {
        if ($this->balance < $amount) {
            return;
        }
        $this->balance -= $amount;
        return $amount;
    }
    public function getBalance() {
        return $this->balance;
    }
}

class Temperature {
    private float $celsius;

    function __construct(float $temp = 0) {
        if ($temp < -273.15) {
            return;
        }
        $this->celsius = $temp;
    }

    public function setCelsius(float $value) {
        if ($value < -273.15) {
            return;
        }
        $this->celsius = $value;
    }
    public function getCelsius() {
        return $this->celsius;
    }
    public function getFahrenheit() {
        return ($this->celsius * (9 / 5)) + 32;
    }
}

// 1. чем отличается private от protected?
// private позволяет использовать свойство или метод лишь внутри самого класса, protected - в наследственных.

// 2. почему не стоит делать все свойства public?
// по возможности информацию лучше держать вне лишнего доступа из исполняемого кода, ради безопасности.

// 3. зачем нужны геттеры и сеттеры, если можно просто сделать свойство public?
// геттеры и сеттеры - непрямое обращение к свойствам, позволяющее задавать слои проверки и других манипуляций.

// 4. может ли метод класса обращаться к private-свойству другого объекта того же класса?
// можно. для этого нужно в этот метод передать сам объект аргументом и от этого обращаться.