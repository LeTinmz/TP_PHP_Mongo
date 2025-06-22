<?php

use App\Entity\Categories;
use App\Repository\CategoriesRepository;

class CategoryService implements ICategoryService{



    public function __construct(private CategoriesRepository $repository){
    }


    public function addCategory(Categories $category): void {
        $this->repository->add($category);

    }

    public function deleteCategory(int $id): void {

        $this->repository->delete($id);
    }
}
