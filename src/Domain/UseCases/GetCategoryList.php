<?php

namespace App\Domain\UseCases;

use App\Domain\Output\GetCategoryListOutputInterface;
use App\Domain\ResponseModel\GetCategoryListResponseModel;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GetCategoryList
{
    private CategoryRepository $repository;
    private SerializerInterface $serializer;
    private GetCategoryListOutputInterface $output;

    /**
     * @param CategoryRepository $repository
     * @param SerializerInterface $serializer
     * @param GetCategoryListOutputInterface $output
     */
    public function __construct(CategoryRepository $repository, SerializerInterface $serializer, GetCategoryListOutputInterface $output)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
        $this->output = $output;
    }

    public function handle(): Response
    {
        $categories = $this->repository->findAll();
        return $this->output->successfullyFetched(new GetCategoryListResponseModel($categories));
    }
}
