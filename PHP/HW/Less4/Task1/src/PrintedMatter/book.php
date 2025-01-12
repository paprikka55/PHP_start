<?php

namespace Less4\Task1\src;

class Book extends PrintedMatter
{
    private string $author;
    private BookGenres  $genre;

    private string $identificationName;

    public function __construct(string $id, string $name, int $pages, string $author, BookGenres  $genre){
        parent::__construct($id, $name, $pages);
        $this->identificationName = "Book";
        $this->author = $author;
        $this->genre = $genre;
    }

    public function getAuthor(): string{
        return $this->author;
    }

    public function getGenre(): BookGenres {
        return $this->genre;
    }

    public function getIdentificationName(): string
    {
        return $this->identificationName;
    }
}