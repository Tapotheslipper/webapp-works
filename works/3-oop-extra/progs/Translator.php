<?php

class Translator
{
    // поля
    public array $tr = ['eng_placeholder' => ['rus_placeholder']];

    // конструктор
    public function __construct(array $tr)
    {
        $this->tr = $tr;
        displayData($this->tr, 'Начальный словарь');
    }

    // методы
    public function add($eng, $rus)
    {
        if (key_exists($eng, $this->tr)) {
            $haystack = $this->tr[$eng];
            if (!in_array($haystack[$rus], $haystack)) {
                $this->tr[$eng][] = $rus;
            }
        } else {
            $this->tr[$eng][] = $rus;
        }

        displayData($this->tr, 'Обновлённый словарь');
    }
    public function remove($eng) {
        if (key_exists($eng, $this->tr)) {
            unset($this->tr[$eng]);
        } else {
            defAn();
        }

        displayData($this->tr, 'Обновлённый словарь');
    }
    public function translate($eng) {
        if (key_exists($eng, $this->tr)) {
            echo($this->tr[$eng][0]);
        } else {
            defAn();
        }
    }
}

$tr_arr = ['mist' => ['туман', 'дымка'], 'fish' => ['рыба']];

$translator1 = new Translator($tr_arr);

newLine();
$new_eng = readline("Добавьте английское слово: ");
newLine();
$new_rus = readline("Добавьте перевод к введённому слову на русский: ");

$translator1->add($new_eng, $new_rus);

$rem_eng = readline("Какое анг. слово хотите удалить из словаря (если никакое, напишите \"0\"): ");
if ($rem_eng !== "0") {
    $translator1->remove($rem_eng);
}

$tran_eng = readline("Перевод какого слова вывести: ");
$translator1->translate($tran_eng);