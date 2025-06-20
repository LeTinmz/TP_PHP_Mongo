<?php

use App\Entity\User;

interface IUserService {
    public function getUserById(int $id);

    public function addUserIdToSession(int $id);

}
