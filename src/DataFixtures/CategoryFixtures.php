<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Factory\CategoryFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $category = new Category();
        // $category->setTitle('Test Title');
        // $category->setDescription('Test Description');
        // $manager->persist($category);

        CategoryFactory::new()->createMany(50);

        $manager->flush();
    }
}
