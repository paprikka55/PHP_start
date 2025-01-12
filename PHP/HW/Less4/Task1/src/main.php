<?php
namespace Less4\Task1\src;
use DateTime;

$libraryRoom = new LibraryRoom("Room1");

$bookShelf1 = $libraryRoom->addNewBookShelf(1);
$rack1 = $bookShelf1->addRack(1);
$rack2 = $bookShelf1->addRack(2);
$rack3 = $bookShelf1->addRack(3);

$book1 = new Book("381358", "Хатха-йога прадипика. Объяснение хатха-йоги", 644, "Свами Муктибодхананда", BookGenres::History);
$book2 = new Book("763045", "Рождественское чудо мистера Туми", 96, "Войцеховски Сьюзан", BookGenres::Fantasy);
$newspaper1 = new Newspaper("G5215", "Вечерний Омск — Неделя", 12, DateTime::createFromFormat("d-m-Y", "30.11.2024"), 11, NewspaperColor::Color);
$magazine1 = new Magazine("M424", "Авторевю", 36, DateTime::createFromFormat("d-m-Y", "24.12.2024"), 24);

echo $rack1->addPrintedMatter($book1);
echo $rack1->addPrintedMatter($magazine1);
echo $rack1->addPrintedMatter($newspaper1);
echo $rack2->addPrintedMatter($book2);