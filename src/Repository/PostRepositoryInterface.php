<?php

namespace App\Repository;

use App\Entity\Post;

interface PostRepositoryInterface
{
    public function find(int $postId): ?Post;

    public function add(Post $post);
}
