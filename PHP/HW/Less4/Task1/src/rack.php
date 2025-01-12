<?php

namespace Less4\Task1\src;





class Rack
{
    private int $number;
    private array $printedMatters;

    public function __construct(int $number, PrintedMatter ...$printedMatter)
    {
        $this->number = $number;
        foreach ($printedMatter as $item) {
            $this->printedMatters[] = $item;
        }
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getPrintedMatterByID(string $id): PrintedMatter|null
    {
        foreach ($this->printedMatters as $printedMatter) {
            if ($printedMatter->getId() === $id) {
                return $printedMatter;
            }
        }
        return null;
    }

    public function addPrintedMatter(PrintedMatter $printedMatter): string
    {
        $this->printedMatters[] = $printedMatter;
        return "{$printedMatter->getIdentificationName()} {$printedMatter->getName()} is added to {$this->number} Rack";
    }
}