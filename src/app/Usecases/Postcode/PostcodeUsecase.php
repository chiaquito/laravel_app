<?php

namespace App\Usecases\Postcode;
use App\Usecases\Postcode\Output\ValidatePostcodeOutput;
use App\Usecases\Postcode\Output\AddressByPostcodeOutput;
use App\Usecases\Repositories\PostcodeRepositoryInterface;

class PostcodeUsecase
{
    private PostcodeRepositoryInterface $repo;

    public function __construct(PostcodeRepositoryInterface $postcodeRepository)
    {
        $this->repo = $postcodeRepository;
    }

    public function validatePostcode(int $postcode): ValidatePostcodeOutput
    {
        $res = $this->repo->fetchOne($postcode);
        return ValidatePostcodeOutput::toOutput($res);
    }

        public function addressByPostcode(int $postcode): AddressByPostcodeOutput
    {
        $res = $this->repo->fetchOne($postcode);
        return AddressByPostcodeOutput::toOutput($res);
    }

}
