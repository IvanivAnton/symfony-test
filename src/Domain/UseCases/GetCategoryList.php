<?php

namespace App\Domain\UseCases;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GetCategoryList
{
    private CategoryRepository $repository;
    private SerializerInterface $serializer;

    /**
     * @param CategoryRepository $repository
     * @param SerializerInterface $serializer
     */
    public function __construct(CategoryRepository $repository, SerializerInterface $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }


    public function handle(): JsonResponse
    {
        $categories = $this->repository->findAll();
        return JsonResponse::fromJsonString($this->serializer->serialize($categories, 'json'));
    }
}
