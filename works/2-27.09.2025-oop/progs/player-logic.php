<?php

$player_type = ['melee' => ['swordsman' => 'swordsman', 'spearman' => 'spearman'], 'ranged' => ['archer' => 'archer', 'gunner' => 'gunner'], 'magic' => ['spellcaster' => 'spellcaster', 'sorcerer' => 'sorcerer'], 'summoner' => ['regular summoner' => 'regular summoner']];
$new_name = readline("Введите имя игрока: ");
echo ("Доступные классы игрока: \n\n");
foreach ($player_type as $player_class => $class_type_arr) {
    echo ($player_class);
    addLine();
}

addLine();
$new_type_class = readline("Выберите класс игрока: ");
if (!(array_key_exists($new_type_class, $player_type))) {
    defaultAnswer();
    exit();
}

echo ("Доступные типы игрока из класса {$new_type_class}: \n\n");
foreach ($player_type[$new_type_class] as $player_type_unit) {
    echo ($player_type_unit);
    addLine();
}

addLine();

$new_type = readline("Введите тип игрока: ");
if (!(array_key_exists($new_type, $player_type[$new_type_class]))) {
    defaultAnswer();
    exit();
}

$player1 = new Player($new_name, $new_type);
addLine();

switch (readline("Хотите начать повышать уровень? Y/N ")) {
    case "Y":
        $lvl_str = str_shuffle('click');
        echo ("Строка для ввода: \"{$lvl_str}\" / Чтобы выйти, напишите \"0\".");
        addLine();
        while ($player1->lvl < 99) {
            addLine();
            $input_str = readline("Введите {$lvl_str}: ");
            switch ($input_str) {
                case $lvl_str:
                    $player1->tren();
                    break;
                case '0':
                    exit();
                    break;
                default:
                    defaultAnswer();
            }
        }
        break;
    case " N":
        break;
    default:
        defaultAnswer();
        break;
}
