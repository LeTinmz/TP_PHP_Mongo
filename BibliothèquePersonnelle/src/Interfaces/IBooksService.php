

<?php

interface IBooksService
{
    public function addBook(BookDTO $book);

    public function editBook($id);

    public function deleteBook(BookDTO $book);

    public function getAllBooks():array /* Tableau de BookDTO*/;

    public function getBookById(int $id):BookDTO;

    public function getBooksByCategory(\App\Enum\CategoryType $category):array /* Tableau de BookDTO*/;

    public function getBookRatingByBookId(int $id);


}
