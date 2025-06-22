<?php

namespace App\Services;

use App\Repository\UsersRepository;

class UsersService
{
    public function __construct(private UsersRepository $repository){

    }

    public function getCurrentUser(Users $user){
        $this->repository->find($user->getId());
    }




}
