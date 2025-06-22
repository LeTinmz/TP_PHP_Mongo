<?php

namespace App\Controller;

use App\Services\UsersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{

    private Users $user;
    private array $library;
    public function __construct(private UsersService $usersService){
        $user = $this->usersService->getUserById(1);
        $this->library = $this->usersService->defineUserLibrary($user);
    }
//    TODO : fetch user from session

//           $user = empty($this->userService->getCurrentUser()) ? $this->usersService->getUserById(1) ? new User($this->userService->getCurrentUser()) : null;

    #[Route('/', name: '_home')]
    public function index(): Response
    {
        $books = $this->user->getBooks();
        return $this->render('home/index.html.twig', [
            'user'=> $this->user,
            'library' => $this->library
        ]);
    }

//    #[Route('/edit/{id})]
    public function editBook(){


    }





//  #[Route('/delete/{id})]

// #[Route('/details/{id}')]






}
