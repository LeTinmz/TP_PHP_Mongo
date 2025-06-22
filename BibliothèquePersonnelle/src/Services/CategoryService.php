<?php

use App\Entity\Categories;
use \App\Repository\CategoriesRepository;
class CategoryService implements ICategoryService
{
    public function __construct(private CategoriesRepository $repository)
    {
    }

    public function getAllCategories(): array
    {
        return $this->repository->findAll();
    }

    public function addCategory(string $categoryName): void
    {
        $category = new Categories();
        $category->setCategoryName($categoryName);

        $this->repository->add($category, true);
    }

    public function deleteCategoryById(int $id): void
    {
        $category = $this->repository->find($id);
        if ($category) {
            $this->repository->remove($category, true);
        }
    }
}

