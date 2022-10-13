<?php

namespace App\Domain\Output;

use App\Domain\ResponseModel\GetCategoryListResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface GetCategoryListOutputInterface
{
    public function successfullyFetched(GetCategoryListResponseModel $responseModel): Response;
}
