<?php

namespace App\Adapters\Presenters;

use App\Domain\ResponseModel\GetOrderResponseModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GetOrderJsonPresenter implements \App\Domain\Output\GetOrderOutputInterface
{
    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function noSuchOrder(GetOrderResponseModel $responseModel): Response
    {
        return new JsonResponse(['message' => 'No such order'], 422);
    }

    public function successfullyFetched(GetOrderResponseModel $responseModel): Response
    {
        return JsonResponse::fromJsonString($this->serializer->serialize($responseModel->getOrder(), 'json'));
    }
}
