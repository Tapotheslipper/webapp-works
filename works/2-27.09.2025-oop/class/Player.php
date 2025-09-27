<?php

class Player
{
    // поля
    public string $name = 'name';
    public int $lvl = 1;
    public string $type = 'none';

    // конструктор
    public function __construct(string $name, string $type)
    {
        try {
            $this->name = $name;
            $this->type = $type;

            dataDisplay($this->name, 'Имя');
            dataDisplay($this->lvl, 'Уровень');
            dataDisplay($this->type, 'Тип');
        } catch (Exception $ex) {
            echo ("Что-то пошло не так. {$ex}");
        }
    }

    // методы
    private function upLvl()
    {
        $this->lvl++;
    }
    public function tren()
    {
        $this->upLvl();
        echo ("Уровень повышен на 1.");
        addLine();
        dataDisplay($this->lvl, 'Уровень');
    }
}
