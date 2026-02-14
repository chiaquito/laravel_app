<?php

namespace App\Usecases\Category;
use App\Usecases\Category\Output\CategoriesOutput;
use App\Usecases\Repositories\CategoryRepositoryInterface;


class CategoryUsecase
{
    private CategoryRepositoryInterface $repo;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repo = $categoryRepository;
    }

    public function categories(): array // array of CategoriesOutput
    {
        $categories = $this->repo->fetchAll();

        return array_map(function ($category) {
            return new CategoriesOutput($category->name);
        }, $categories);
    }
}
