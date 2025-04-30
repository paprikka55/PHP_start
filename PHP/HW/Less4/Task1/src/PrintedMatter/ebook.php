<?php
namespace Less4\Task1\src;

class EBook extends Book
{
  public function __construct(string $id, string $name, int $pages, string $sourceLink, string $author, BookGenres  $genre) {
    parent::__construct($id, $name, $pages, $sourceLink, $author, $genre);
  }
}