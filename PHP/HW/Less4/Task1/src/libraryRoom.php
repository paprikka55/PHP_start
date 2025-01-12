<?php

namespace Less4\Task1\src;

class LibraryRoom
{
    private array $bookShelves;
    private string $name;

    public function __construct(string $name, BookShelf ...$bookShelf)
    {
        $this->name = $name;
        foreach ($bookShelf as $item) {
            $this->bookShelves[] = $item;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addNewBookShelf(int $number): BookShelf{
        $this->bookShelves[] = new BookShelf($number);
        return $this->getBookShelfByNumber($number);
    }

    public function getBookShelfByNumber(int $number): BookShelf|null
    {
        foreach ($this->bookShelves as $bookShelf) {
            if ($bookShelf->getNumber() === $number) {
                return $bookShelf;
            }
        }
        return null;
    }

}