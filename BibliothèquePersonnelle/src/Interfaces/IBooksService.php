

<?php

use App\Enum\CategoryType;

interface IBooksService
{
    public function addBook(BookDTO $book);

    public function editBook(int $id, BookDTO $book);

    public function deleteBook(int $id);

    public function getAllBooks():array /* Tableau de BookDTO*/;

    public function getBookById(int $id):BookDTO;

    public function getBooksByCategory(CategoryType $category):array /* Tableau de BookDTO*/;

    public function getBookRatingByBookId(int $id);

}
