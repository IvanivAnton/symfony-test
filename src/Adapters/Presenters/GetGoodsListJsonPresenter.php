<?php

namespace App\Adapters\Presenters;

use App\Domain\ResponseModel\GetGoodsListResponseModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GetGoodsListJsonPresenter implements \App\Domain\Output\GetGoodsListOutputInterface
{
    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function successfullyFetched(GetGoodsListResponseModel $responseModel): Response
    {
        return JsonResponse::fromJsonString(
            $this->serializer->serialize(
                $responseModel->getGoods(),
                'json',
                ['groups' => ['read']]
            )
        );
    }
}
