<?php

namespace App\Factory;

use App\Entity\Category;
use Zenstruck\Foundry\ModelFactory;

final class CategoryFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(50),
            'description' => self::faker()->paragraphs(
                self::faker()->numberBetween(1, 4),
                true
            ),
        ];
    }

    protected static function getClass(): string
    {
        return Category::class;
    }
}
