<?php

namespace Less4\Task1\src;

use DateTime;


class Magazine extends PrintedMatter
{
    private DateTime $releaseDate;
    private int $releaseNumber;

    private int $identificationName;

    /**
     * @param DateTime $releaseDate
     * @param int $releaseNumber
     */
    public function __construct(string $id, string $name, int $pages, DateTime $releaseDate, int $releaseNumber)
    {
        parent::__construct($id, $name, $pages);
        $this->releaseDate = $releaseDate;
        $this->releaseNumber = $releaseNumber;
        $this->identificationName = "Magazine";
    }

    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    public function getReleaseNumber(): int
    {
        return $this->releaseNumber;
    }


    public function getIdentificationName(): string
    {
        return $this->identificationName;
    }
}