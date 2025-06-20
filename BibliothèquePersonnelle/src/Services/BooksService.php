<?php

namespace App\Services;

use App\Repository\BooksRepository;

class BooksService
{
    public function __construct(private BooksRepository $repository)
    {
    }

    public function getAllBooks()
    {
        return $this->repository->findAll();
    }
}
