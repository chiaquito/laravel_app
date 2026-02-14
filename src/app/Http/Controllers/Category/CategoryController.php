<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Category\Requests\CategoriesByCustomerTypeIdRequest;
use Illuminate\Http\JsonResponse;
use App\Usecases\Category\CategoryUsecase;
use App\Http\Controllers\Common\HttpResponse;
use App\Http\Controllers\Category\Requests\CategoriesRequest;

class CategoryController
{

    private CategoryUsecase $uc;

    public function __construct(CategoryUsecase $usecase)
    {
        $this->uc = $usecase;
    }

    public function categories(CategoriesRequest $req): JsonResponse
    {
        try{
            $output = $this->uc->categories($req->customerTypeId);
            return HttpResponse::toResponse($output);
        } catch (\Exception $e) {
            return HttpResponse::toErrorResponse($e->getMessage(), 500);
        }
    }

    public function categoriesByCustomerType(CategoriesByCustomerTypeIdRequest $req): JsonResponse
    {
        try{
            $output = $this->uc->categoriesByCustomerType($req->customerTypeId);
            return HttpResponse::toResponse($output);
        } catch (\Exception $e) {
            return HttpResponse::toErrorResponse($e->getMessage(), 500);
        }
    }
}
