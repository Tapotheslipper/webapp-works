<?php

abstract class Notification
{
    public string $recipient;

    function __construct(string $recipient)
    {
        $this->recipient = $recipient;
    }

    abstract function send(string $message);
    public function getRecipient()
    {
        return ($this->recipient);
    }
}

class EmailNotification extends Notification
{
    function __construct(string $email)
    {
        parent::__construct($email);
    }

    public function send(string $message)
    {
        echo ("Email sent to {$this->recipient}: {$message}");
    }
}

class SmsNotification extends Notification
{
    function __construct(string $phone_num)
    {
        parent::__construct($phone_num);
    }

    public function send(string $message)
    {
        echo ("SMS sent to {$this->recipient}: {$message}");
    }
}

// 1. Какое ключевое слово используется для наследования в PHP?
// Для того, чтобы сделать подкласс - extends, ставящееся после названия нового класса и указывающее на то, от какого класса наследовать. Для обращения к свойствам/методам прямого родителя внутри подкласса используется parent::.

// 2. Зачем нужно ключевое слово parent? Приведите пример его использования
// Для обращения к свойствам и методам класса-родителя. parent::__construct(значение более узконаправленное, подходящее к обощающему значению в конструкторе родителя).

// 3. В чём разница между обычным и абстрактным классом?
// Абстрактный класс не предназначен для создания объектов и служит чисто шаблоном для своих подклассов (шаблон для написания шаблонов).

// 4. Может ли дочерний класс иметь собственные свойства и методы, которых нет у родителя?
// Может, смысл наследственности классов в том, чтобы через родительские классы задавать общие свойства и методы, применимые ко всем подклассам, а специфичные свойства и методы оставлять подклассам.

// 5. Что произойдёт, если не реализовать абстрактный метод в дочернем классе?
// Произойдёт бум. Абстрактные классы обязательно должны быть применены в подклассах и без этого код выдаст ошибку.