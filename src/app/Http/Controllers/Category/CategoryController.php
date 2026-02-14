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
        try{
            $output = $this->uc->categories();
            return HttpResponse::toResponse($output);
        } catch (\Exception $e) {
            return HttpResponse::toErrorResponse($e->getMessage(), 500);
        }
    }

    public function categoriesByCustomerType(): JsonResponse
    {
        try{
            $output = $this->uc->categoriesByCustomerType();
            return HttpResponse::toResponse($output);
        } catch (\Exception $e) {
            return HttpResponse::toErrorResponse($e->getMessage(), 500);
        }
    }
}
