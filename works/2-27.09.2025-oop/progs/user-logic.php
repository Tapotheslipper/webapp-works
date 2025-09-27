<?php

$new_name = readline("Введите имя пользователя: ");
$new_pass = md5(readline("Введите пароль пользователя: "));
$new_email = readline("Введите электронную почту: ");

$user1 = new User($new_name, $new_pass, $new_email);
addLine();
addLine();

switch (readline("Хотите изменить пароль? Введите 1, если да, и 2, если нет: ")) {
    case "1":
        $check_old_pass = md5(readline("Введите старый пароль: "));
        $new_pass = md5(readline("Введите новый пароль: "));
        $user1->changePass($check_old_pass, $new_pass);
        break;
    case "2":
        break;
    default:
        defaultAnswer();
        break;
}
addLine();
addLine();

switch (readline("Хотите изменить эл. почту? Введите 1, если да, и 2, если нет: ")) {
    case "1":
        $check_pass = md5(readline("Введите пароль: "));
        $new_email = readline("Введите новую эл. почту: ");
        $user1->changeEmail($check_pass, $new_email);
        break;
    case "2":
        break;
    default:
        defaultAnswer();
        break;
}
