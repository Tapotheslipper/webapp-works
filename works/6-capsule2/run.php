<?php

class SecureWallet {
    private float $balance;
    private string $pin;

    function __construct(float $bal, string $pin) {
        if ($bal < 0 || !ctype_digit($pin) || strlen($pin) !== 4) {
            throw new InvalidArgumentException("Отказано.");
            return;
        }
        $this->balance = $bal;
        $this->pin = $pin;
    }

    public function deposit(float $amount, string $pin): void {
        if ($this->pin !== $pin || $amount <= 0) {
            throw new InvalidArgumentException("Отказано.");
            return;
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount, string $pin): float {
        if ($this->pin !== $pin || $amount > $this->balance) {
            throw new InvalidArgumentException("Отказано.");
            return;
        }
        $this->balance -= $amount;
        return $amount;
    }

    public function getBalance(string $pin) {
        if ($this->pin !== $pin): float {
            throw new InvalidArgumentException("Отказано.");
            return;
        }
        return $this->balance;
    }
}

$wallet1 = new SecureWallet(42, '1234');