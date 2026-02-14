<?php

namespace App\Usecases\Category;
use App\Usecases\Category\Output\CategoriesOutput;
use App\Usecases\Repositories\CategoryRepositoryInterface;
use App\Domains\Category\Category;


class CategoryUsecase
{
    private CategoryRepositoryInterface $repo;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repo = $categoryRepository;
    }

    public function categories(int $customerTypeId): array // array of CategoriesOutput
    {
        $categories = $this->repo->fetchAll();

        // カスタマータイプIDに基づいて表示可能なカテゴリをフィルタリング
        $filteredCategories = array_filter($categories, function ($category) use ($customerTypeId) {

            $domain = new Category($category->id, $category->name, $category->serviceId);
            return $domain->isDisplayable($customerTypeId);
        });

        return CategoriesOutput::toOutput($filteredCategories);
    }


    public function categoriesByCustomerType(int $customerTypeId): array // array of CategoriesOutput
    {
        $categories = $this->repo->fetchByCustomerTypeId($customerTypeId);
        return CategoriesOutput::toOutput($categories);
    }
}
