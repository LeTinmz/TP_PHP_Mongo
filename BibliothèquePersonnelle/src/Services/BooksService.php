<?php

namespace App\Services;
use App\Enum\CategoryType;
use App\Repository\BooksRepository;
use BookDTO;

class BooksService {

    public function __construct(private BooksRepository $booksRepository) {}
    public function getAllBooks(){
        $booksToReturn = [];
        $books = $this->booksRepository->findAll();
        foreach ($books as $book){
            $booksToReturn[] = new BookDTO($book->getTitle(), $book->getAuthor(), $book->getCategories());
        }
        return $booksToReturn;


    }

    public function getBookById(int $id):BookDTO{
        $book = $this->booksRepository->find($id);
        return new BookDTO($book->getTitle(), $book->getAuthor(), $book->getCategories());
    }

    public function getRandomBook(){
        return new BookDTO("coucou","wesh","keskidi");

    }

    public function getBooksByCategory(CategoryType $category):array{
        $booksToReturn = [];
        $books = $this->booksRepository->find($category);
        foreach ($books as $book){
            $booksToReturn[] = new BookDTO($book->getTitle(), $book->getAuthor(), $book->getCategories());
        }

        return $booksToReturn;
    }

    public function getBookRatingByBookId(int $id){


    }
}
