<?php

declare(strict_types=1);

namespace App\Library;

class Book
{

    private $title;
    private $pages;
    private $pagesRead = 1;

    public function __construct(string $title, int $pages)
    {
        $this->title = $title;
        $this->pages = $pages;
    }

    public function read(int $pagesRead): void
    {
        $this->pagesRead += $pagesRead;
    }

    public function currentPage(): int
    {
        return $this->pagesRead;
    }
}
