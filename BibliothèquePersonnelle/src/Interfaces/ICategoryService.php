<?php

use App\Entity\Categories;

interface ICategoryService {

    public function addCategory(Categories $category): void;
    public function deleteCategory(int $id): void;
}
