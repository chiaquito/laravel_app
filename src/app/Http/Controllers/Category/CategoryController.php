<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\JsonResponse;
use App\Usecases\Category\CategoryUsecase;
use App\Http\Controllers\Common\HttpResponse;

class CategoryController
{
    public function categories(): JsonResponse
    {
        $uc = new CategoryUsecase();
        $categories = $uc->categories();

        return HttpResponse::toResponse($categories);

        // return response()->json($categories, 200, ['Content-Type' => 'application/json;charset=UTF-8'], JSON_UNESCAPED_UNICODE);

        // return new JsonResponse(data:[
        //     'categories' => $categories
        // ],headers:['Content-Type' => 'application/json;charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }
}
