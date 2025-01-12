<?php

namespace Less4\Task1\src;

class BookShelf
{
    private int $number;
    private array $racks;
    public function __construct(int $number, Rack ...$rack){
        $this->number = $number;
        foreach ($rack as $item) {
            $this->racks[] = $item;
        }
    }

    public function getNumber(): int{
        return $this->number;
    }

    public function addRack(int $number): Rack
    {
        $this->racks[] = new Rack($number);
        return $this->getRackByNumber($number);
    }

    public function getRackByNumber(int $number): Rack|null{
        foreach ($this->racks as $rack){
            if ($rack->getNumber() === $number){
                return $rack;
            }
        }
        return null;
    }
}