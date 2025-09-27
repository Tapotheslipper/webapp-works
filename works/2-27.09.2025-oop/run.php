<?php

// include("class/User.php");

// $user1 = new User('Orelov', 32);
// $user1->dataDisplay();

// $user1->setEmail('sosi@gmail.com');

// echo $user1->show();

function addLine() {
    return "\n";
}

function defaultAnswer() {
    echo(addLine());
    return "Неверный ввод.";
}

function dataDisplay(string $str, string $type) {
    echo(addLine());
    echo "{$type}: {$str}";
}

include("class/User1.php");
include("class/Player.php");

switch (readline("Какую программу запускать? User (задания 1 - 4) или Player (задание 5)? Введите название программы (пример - \"User\"): ")) {
    case 'User':
        $new_name = readline("Введите имя пользователя: ");
        $new_pass = md5(readline("Введите пароль пользователя: "));
        $new_email = readline("Введите электронную почту: ");

        $user1 = new User($new_name, $new_pass, $new_email);
        echo "\n\n";

        switch (readline("Хотите изменить пароль? Введите 1, если да, и 2, если нет: ")) {
            case "1":
                $check_old_pass = md5(readline("Введите старый пароль: "));
                $new_pass = md5(readline("Введите новый пароль: "));
                $user1->changePass($check_old_pass, $new_pass);
                break;
            case "2":
                break;
            default:
                echo(defaultAnswer());
                break;
        }
        echo "\n\n";

        switch (readline("Хотите изменить эл. почту? Введите 1, если да, и 2, если нет: ")) {
            case "1":
                $check_pass = md5(readline("Введите пароль: "));
                $new_email = readline("Введите новую эл. почту: ");
                $user1->changeEmail($check_pass, $new_email);
                break;
            case "2":
                break;
            default:
                echo(defaultAnswer());
                break;
        }
        break;
    case 'Player':
        $player_type = ['melee' => ['swordsman' => 'swordsman', 'spearman' => 'spearman'], 'ranged' => ['archer' => 'archer', 'gunner' => 'gunner'], 'magic' => ['spellcaster' => 'spellcaster', 'sorcerer' => 'sorcerer'], 'summoner' => ['regular summoner' => 'regular summoner']];
        $new_name = readline("Введите имя игрока: ");
        echo("Доступные классы игрока: \n\n");
        foreach ($player_type as $player_class => $class_type_arr) {
            echo($player_class);
            echo(addLine());
        }
        echo(addLine());
        // echo("Доступные типы игрока (типы ПОД классами): \n\n");
        // foreach ($player_type as $player_type_key => $player_type_elem) {
        //     echo("Класс " . $player_type_key);
        //     echo("\n");
        //     foreach ($player_type_elem as $player_type_subkey => $player_type_subelem) {
        //         echo($player_type_subelem . ' - ' . $player_type_subkey);
        //         echo("\n");
        //     }
        //     echo("\n");
        // }
        $new_type_class = readline("Выберите класс игрока: ");
        if (!(array_key_exists($new_type_class, $player_type))) {
            echo(defaultAnswer());
            exit();
        }
        echo("Доступные типы игрока из класса {$new_type_class}: \n\n");
        foreach ($player_type[$new_type_class] as $player_type_unit) {
            echo($player_type_unit);
            echo(addLine());
        }
        echo(addLine());

        $new_type = readline("Введите тип игрока: ");
        if (!(array_key_exists($new_type, $player_type[$new_type_class]))) {
            echo(defaultAnswer());
            exit();
        }

        $player1 = new Player($new_name, $new_type);
        echo(addLine());

        switch(readline("Хотите начать повышать уровень? Y/N ")) {
            case "Y":
                $lvl_str = str_shuffle('click');
                echo("Строка для ввода: \"{$lvl_str}\" / Чтобы выйти, напишите \"0\".");
                echo(addLine());
                while ($player1->lvl < 99) {
                    echo(addLine());
                    $input_str = readline("Введите {$lvl_str}: ");
                    // switch ($input_str):
                    //     case $lvl_str:
                    //         
                    //         break;
                    //     case '0':
                    //         exit();
                    //         break;
                    //     default:
                    //         echo(defaultAnswer());
                    //         break;
                    if ($input_str === $lvl_str) {
                        $player1->tren($input_str);
                    } elseif ($input_str === '0') {
                        exit();
                    } else {
                        echo(defaultAnswer());
                    }
                }
                break;
            case "N":
                break;
            default:
                echo(defaultAnswer());
                break;
        }
        break;
    default:
        echo(defaultAnswer());
        break;
}



?>