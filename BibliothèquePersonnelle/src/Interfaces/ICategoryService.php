<?php

interface ICategoryService {

    public function addCategory(string $categoryName);
    public function deleteCategory(int $id);

    public function getAllCategories();
}
