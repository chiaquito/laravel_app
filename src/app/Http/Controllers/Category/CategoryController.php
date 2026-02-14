<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\JsonResponse;
use App\Usecases\Category\CategoryUsecase;
use App\Http\Controllers\Common\HttpResponse;
use App\Models\Category;

class CategoryController
{
    public function categories(): JsonResponse
    {
        // TODO: when this app starts, dependency injection executed in the specfic place, such as main
        $uc = new CategoryUsecase(new Category());
        $categories = $uc->categories();

        return HttpResponse::toResponse($categories);
    }
}
