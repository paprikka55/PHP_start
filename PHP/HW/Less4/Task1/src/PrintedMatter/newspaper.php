<?php

namespace Less4\Task1\src;

use DateTime;

class Newspaper extends Magazine
{
    private NewspaperColor $newspaperColor;
    private string $identificationName;
    public function __construct(string $id, string $name, int $pages, DateTime $releaseDate, int $releaseNumber, NewspaperColor $newspaperColor){
        parent::__construct($id, $name, $pages, $releaseDate, $releaseNumber);
        $this->newspaperColor = $newspaperColor;
        $this->identificationName = "Newspaper";
    }

    public function getNewspaperColor(): NewspaperColor
    {
        return $this->newspaperColor;
    }

    public function getIdentificationName(): string
    {
        return $this->identificationName;
    }


}