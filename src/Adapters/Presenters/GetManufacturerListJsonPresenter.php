<?php

namespace App\Adapters\Presenters;

use App\Domain\ResponseModel\GetManufacturerListResponseModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GetManufacturerListJsonPresenter implements \App\Domain\Output\GetManufacturerListOutputInterface
{
    private SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function successfullyFetched(GetManufacturerListResponseModel $responseModel): Response
    {
        return JsonResponse::fromJsonString(
            $this->serializer->serialize($responseModel->getManufacturers(), 'json')
        );
    }
}
