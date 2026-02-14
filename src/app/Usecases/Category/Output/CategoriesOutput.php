<?php

namespace App\Usecases\Category\Output;

class CategoriesOutput
{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function toOutput(array $categories): array
    {
        return array_map(function ($category) {
            return new CategoriesOutput($category->id, $category->name);
        }, $categories);
    }
}
