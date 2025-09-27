<?php

function addLine()
{
    echo ("\n");
}

function defaultAnswer()
{
    addLine();
    echo ("Неверный ввод.");
}

function dataDisplay(string $str, string $type)
{
    addLine();
    echo ("{$type}: {$str}");
}

include("class/User1.php");
include("class/Player.php");

switch (readline("Какую программу запускать? User (задания 1 - 4) или Player (задание 5)? Введите название программы (пример - \"User\"): ")) {
    case 'User':
        include("progs/user-logic.php");
        break;
    case 'Player':
        include("progs/player-logic.php");
        break;
    default:
        defaultAnswer();
        break;
}
