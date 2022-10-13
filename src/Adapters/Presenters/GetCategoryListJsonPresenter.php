<?php

namespace App\Adapters\Presenters;

use App\Domain\ResponseModel\GetCategoryListResponseModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GetCategoryListJsonPresenter implements \App\Domain\Output\GetCategoryListOutputInterface
{
    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }


    public function successfullyFetched(GetCategoryListResponseModel $responseModel): Response
    {
        return JsonResponse::fromJsonString($this->serializer->serialize($responseModel->getCategories(), 'json'));
    }
}
