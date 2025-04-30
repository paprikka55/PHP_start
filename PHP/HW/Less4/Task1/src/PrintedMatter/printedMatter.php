<?php

namespace Less4\Task1\src;

abstract class PrintedMatter implements IPrintedMatterIdented
{
    private string $id;
    private bool $isBusy;
    private string $name;
    private int $pages;
    private string $source;

    /**
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name, int $pages, string $source)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pages = $pages;
        $this->isBusy = false;
        $this->source = $source;
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

    private function setIsBusy(bool $isBusy): void
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

    public function getOnHands(): string
    {
        $this->setIsBusy(true);
        return $this->source;
    }
}