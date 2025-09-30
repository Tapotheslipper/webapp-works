<?php

class Account
{
    // поля
    private float $balance = 0.00;
    private float $balance_max = 1000.00;
    private float $balance_min = 0.00;

    // конструктор
    public function __construct(float $balance)
    {
        $this->balance = $balance;
        displayData($this->balance, 'Баланс');
    }

    // методы
    public function deposit($amount)
    {
        $min_balance = $this->balance_min;
        if ($amount <= $min_balance) {
            $this->notify("Невозможно поплность баланс меньше минимума или на сумму, равную минимуму в {$min_balance}.");
        }
        $max_balance = $this->balance_max;
        if (($amount + $this->balance) > $max_balance) {
            $this->notify('При пополнении баланса на введённую сумму превысился бы лимит средств. Операция отклонена.');
            return;
        }
        $this->balance += $amount;
        displayData($this->balance, 'Обновлённый баланс');
        if ($this->balance === $max_balance) {
            $this->notify("Ваш баланс достиг лимита в {$max_balance}");
        }
    }
    public function withdraw($amount)
    {
        if ($this->balance < $amount) {
            $this->notify('Недостаточно средств для списания. Операция отклонена.');
            return;
        }
        $this->balance -= $amount;
        $this->notify("С вашего счёта успешно списано {$amount}.");
        displayData($this->balance, 'Обновлённый баланс');
        if ($this->balance === $this->balance_min) {
            $this->notify("Ваш баланс достиг минимума в {$this->balance_min}");
        }
    }
    public function checkBalance()
    {
        displayData($this->balance, 'Текущий баланс');
    }
    private function notify($event_message)
    {
        displayData($event_message, 'Уведомление');
    }
}

$new_balance = readline('Какой изначально быть баланс на карте: ');
if (!(is_numeric($new_balance))) {
    defAn();
    exit();
}
$new_balance = (float)$new_balance;
$account1 = new Account($new_balance);

newLine();
$new_deposit = readline("На сколько хотите пополнить баланс: ");
if (is_numeric($new_deposit)) {
    $account1->deposit($new_deposit);
} else {
    defAn();
}

newLine();
$new_withdraw = readline("Сколько хотите снять с баланса: ");
if (is_numeric($new_withdraw)) {
    $account1->withdraw($new_withdraw);
} else {
    defAn();
}

newLine();
$check_bal = readline("Хотите проверить свой баланс? Y/N ");
switch ($check_bal) {
    case "Y":
        $account1->checkBalance();
        break;
    case "N":
        break;
}
