<?php

namespace App\Adapters\Presenters;

use App\Domain\Output\CreateOrderOutputInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateOrderJsonPresenter implements CreateOrderOutputInterface
{

    public function successfullyCreated(): Response
    {
        return new JsonResponse(null, 204);
    }

    public function someGoodsDoNotExist(): Response
    {
        return new JsonResponse(['message' => "Some goods do not exist"], 422);
    }
}
