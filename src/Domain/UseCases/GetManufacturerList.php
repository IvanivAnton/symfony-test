<?php

namespace App\Domain\UseCases;

use App\Repository\ManufacturerRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GetManufacturerList
{
    private ManufacturerRepository $repository;
    private SerializerInterface $serializer;

    /**
     * @param ManufacturerRepository $repository
     * @param SerializerInterface $serializer
     */
    public function __construct(ManufacturerRepository $repository, SerializerInterface $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }


    public function handle(): JsonResponse
    {
        $manufacturers = $this->repository->findAll();
        return JsonResponse::fromJsonString(
            $this->serializer->serialize($manufacturers, 'json')
        );
    }
}
