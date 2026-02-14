<?php

namespace App\Http\Controllers\Postcode;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Common\HttpResponse;
use App\Usecases\Postcode\PostcodeUsecase;

class PostcodeController extends Controller
{
    private PostcodeUsecase $uc;

    public function __construct(PostcodeUsecase $uc)
    {
        $this->uc = $uc;
    }

    public function validatePostcode($req)
    {
        try {
            $output = $this->uc->validatePostcode($req);
            return HttpResponse::toResponse($output);
        } catch (\Exception $e) {
            return HttpResponse::toErrorResponse($e->getMessage(), 500);
        }
    }

    public function addressByPostcode($req)
    {
        try {
            $output = $this->uc->addressByPostcode($req);
            return HttpResponse::toResponse($output);
        } catch (\Exception $e) {
            return HttpResponse::toErrorResponse($e->getMessage(), 500);
        }
    }
}
