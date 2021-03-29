<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class DoctrinePostRepository implements PostRepositoryInterface
{
    private $entityManager;
    private $objectRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->objectRepository = $this->entityManager->getRepository(Post::class);
    }

    public function find(int $postId): ?Post
    {
        return $this->objectRepository->find($postId);
    }

    public function add(Post $post)
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }
}
