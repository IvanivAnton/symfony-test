<?php

namespace App\Domain\UseCases;

use App\Repository\OrderRepository;
use App\Requests\GetOrderRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GetOrder
{
    private OrderRepository $repository;
    private SerializerInterface $serializer;

    /**
     * @param OrderRepository $repository
     * @param SerializerInterface $serializer
     */
    public function __construct(OrderRepository $repository, SerializerInterface $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }

    public function handle(GetOrderRequest $requestData): JsonResponse
    {
        $order = $this->repository->find($requestData->getId());
        if(empty($order)) {
            return new JsonResponse(['message' => 'No such order'], 422);
        }

        return JsonResponse::fromJsonString($this->serializer->serialize($order, 'json'));
    }
}
