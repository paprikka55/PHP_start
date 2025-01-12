<?php

namespace Less4\Task1\src;

abstract class PrintedMatter implements IPrintedMatterIdented
{
    private string $id;
    private bool $isBusy;
    private string $name;
    private int $pages;


    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name, int $pages)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pages = $pages;
        $this->isBusy = false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isBusy(): bool
    {
        return $this->isBusy;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setIsBusy(bool $isBusy): void
    {
        $this->isBusy = $isBusy;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

}