<?php

namespace App\Domain\Output;

use App\Domain\ResponseModel\GetManufacturerListResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface GetManufacturerListOutputInterface
{
    public function successfullyFetched(GetManufacturerListResponseModel $responseModel): Response;
}
