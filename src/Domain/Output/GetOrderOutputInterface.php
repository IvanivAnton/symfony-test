<?php

namespace App\Domain\Output;

use App\Domain\ResponseModel\GetOrderResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface GetOrderOutputInterface
{
    public function noSuchOrder(GetOrderResponseModel $responseModel): Response;
    public function successfullyFetched(GetOrderResponseModel $responseModel): Response;
}
