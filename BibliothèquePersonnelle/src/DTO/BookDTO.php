<?php


use App\Enum\CategoryType;

class BookDTO
{
    public function __construct(public string $title, public string $author, public string $category){}



}
