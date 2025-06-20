<?php

namespace App\Controller;

use App\Services\BooksService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BooksController extends AbstractController
{
    #[Route('/books')]
    public function getBookById(BooksService $booksService): Response
    {
        $book = $booksService->getRandomBook();
        return $this->render('books/index.html.twig', [
            'book' => $book,
        ]);
    }
}
