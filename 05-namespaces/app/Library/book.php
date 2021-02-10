<?php

namespace App\Library;

class Book
{

    private $title;
    private $pages;
    private $pagesRead = 1;

    public function __construct($title, $pages)
    {
        $this->title = $title;
        $this->pages = $pages;
    }

    public function read($pagesRead)
    {
        $this->pagesRead += $pagesRead;
    }

    public function currentPage()
    {
        return $this->pagesRead;
    }
}
