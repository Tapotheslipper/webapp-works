<?php

function newLine() {
    echo("\n");
}

function defAn() {
    newLine();
    echo("Некорректный ввод.");
}

function displayData($data, string $tie) {
    newLine();
    echo("{$tie}: ");
    if (is_array($data)) {
        print_r($data);
        return;
    }
    echo $data;
}

switch (readline("Какую программу запустить? (1 - Book, 2 - Translator, 3 - Account): ")) {
    case "1":
        include("progs/Book.php");
        break;
    case "2":
        include("progs/Translator.php");
        break;
    case "3":
        include("progs/Account.php");
        break;
    default:
        defAn();
        break;
}


