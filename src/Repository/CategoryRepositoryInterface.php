<?php

namespace App\Repository;

use App\Entity\Category;

interface CategoryRepositoryInterface
{
    public function find(int $categoryId): ?Category;

    public function add(Category $category);
}
