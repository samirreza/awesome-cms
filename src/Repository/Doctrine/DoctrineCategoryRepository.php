<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineCategoryRepository implements CategoryRepositoryInterface
{
    private $entityManager;
    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Category::class);
    }

    public function find(int $categoryId): ?Category
    {
        return $this->objectRepository->find($categoryId);
    }

    public function add(Category $category)
    {
        $this->entityManager->persist($category);
        $this->entityManager->flush();
    }
}
