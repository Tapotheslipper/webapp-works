<?php

class Book
{
    // поля
    public string $title = 'placeholder';
    public string $author = 'placeholder';
    public int $page = 0;

    // конструктор
    public function __construct(string $title, string $author, int $page)
    {
        $this->title = $title;
        $this->author = $author;
        $this->page = $page;

        $this->displayInfo();
    }

    // методы
    public function displayInfo()
    {
        displayData($this->title, 'Название');
        displayData($this->author, 'Автор');
        displayData($this->page, 'Кол-во страниц');
    }
    public function isLongBook() {
        $check = False;
        if ($this->page > 300) {
            $check = True;
        }
        return $check;
    }
}

$new_title = readline("Название для книги: ");
$new_author = readline("Автор книги: ");
$new_page = readline("Кол-во страниц в книге: ");
if (!is_numeric($new_page)) {
    defAn();
    exit();
}

$book1 = new Book($new_title, $new_author, $new_page);
newLine();
echo("Длинная ли книга? " . ($book1->isLongBook() ? 'True' : 'False'));