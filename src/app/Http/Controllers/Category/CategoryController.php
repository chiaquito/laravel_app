<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\JsonResponse;
use App\Usecases\Category\CategoryUsecase;
use App\Http\Controllers\Common\HttpResponse;

class CategoryController
{

    private CategoryUsecase $uc;

    public function __construct(CategoryUsecase $usecase)
    {
        $this->uc = $usecase;
    }

    public function categories(): JsonResponse
    {
        $categories = $this->uc->categories();

        return HttpResponse::toResponse($categories);
    }

    public function categoriesByCustomerType(): JsonResponse
    {
        $categories = $this->uc->categoriesByCustomerType();

        return HttpResponse::toResponse($categories);
    }
}
