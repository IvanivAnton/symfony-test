<?php

namespace App\Domain\Output;

use App\Domain\ResponseModel\GetGoodsListResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface GetGoodsListOutputInterface
{
    public function successfullyFetched(GetGoodsListResponseModel $responseModel): Response;
}
