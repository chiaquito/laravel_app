<?php

namespace App\Usecases\Category;
use App\Usecases\Category\Output\CategoriesOutput;

use App\Models\Category;

class CategoryUsecase
{
    public function __construct()
    {
        // Initialize any dependencies or services here
    }

    public function categories(): array // CategoryOutput
    {

        $repo = new Category();
        $categories = $repo->find();

        return array_map(function ($category) {
            return new CategoriesOutput($category->name);
        }, $categories);
    }
}
