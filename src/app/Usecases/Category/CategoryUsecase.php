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

    public function categories(): array // array of CategoriesOutput
    {
        $categories = $this->repo->fetchAll();
        $filtered = array_filter($categories, function ($category) {
            $domain = new Category($category->id, $category->name, $category->serviceId);
            // TODO: 引数をリクエストによって動的に変更できるようにする
            return $domain->isDisplayable(3); // 顧客タイプIDが1の場合は全てのカテゴリを表示

        });

        return CategoriesOutput::toOutput($filtered);
    }


    public function categoriesByCustomerType(): array // array of CategoriesOutput
    {
        $customerTypeId = 1;

        $categories = $this->repo->fetchByCustomerTypeId($customerTypeId);
        return CategoriesOutput::toOutput($categories);
    }
}
