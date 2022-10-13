<?php

namespace App\Domain\Output;

use App\Domain\ResponseModel\GetCategoryListResponseModel;
use Symfony\Component\HttpFoundation\Response;

interface CreateOrderOutputInterface
{
    public function successfullyCreated(): Response;
    public function someGoodsDoNotExist(): Response;
}
