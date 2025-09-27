<?php

class User{
    // поля
    public string $username = 'qwerty';
    public string $password = '123456';
    public string $email = 'example@email.dot';

    // конструктор
    public function __construct(string $name, string $pass, string $email) {
        try {
            $this->username = $name;
            $this->password = $pass;
            $this->email = $email;

            dataDisplay($this->username, "Имя");
            dataDisplay($this->password, "Пароль");
            dataDisplay($this->email, "Эл. почта");
        } catch (Exception $ex) {
            echo "Что-то пошло не так. {$ex}";
        }

    }

    // методы
    public function changePass(string $old_pass, string $new_pass) {
        if ($this->password === $old_pass) {
            switch (readline("Подтвердить изменение пароля? Y/N ")) {
                case "Y":
                    $this->password = $new_pass;
                    dataDisplay($this->password, 'Новый пароль');
                    break;
                case "N":
                    break;
                default:
                    echo(defaultAnswer());
            }
        } else {
            echo(defaultAnswer());
        }
    }
    public function changeEmail(string $pass, $new_email) {
        if ($this->password === $pass) {
            switch (readline("Подтвердить изменение эл. почты? Y/N ")) {
                case "Y":
                    $this->email = $new_email;
                    dataDisplay($this->email, 'Новая эл. почта');
                    break;
                case "N":
                    break;
                default:
                    echo(defaultAnswer());
                    break;
            }
        } else {
            echo(defaultAnswer());
        }
    }
}

?>