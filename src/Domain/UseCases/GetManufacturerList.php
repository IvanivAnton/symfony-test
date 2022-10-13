<?php

namespace App\Domain\UseCases;

use App\Domain\Output\GetManufacturerListOutputInterface;
use App\Domain\ResponseModel\GetManufacturerListResponseModel;
use App\Repository\ManufacturerRepository;
use Symfony\Component\HttpFoundation\Response;

class GetManufacturerList
{
    private ManufacturerRepository $repository;
    private GetManufacturerListOutputInterface $output;

    /**
     * @param ManufacturerRepository $repository
     * @param GetManufacturerListOutputInterface $output
     */
    public function __construct(ManufacturerRepository $repository, GetManufacturerListOutputInterface $output)
    {
        $this->repository = $repository;
        $this->output = $output;
    }

    public function handle(): Response
    {
        $manufacturers = $this->repository->findAll();
        return $this->output->successfullyFetched(new GetManufacturerListResponseModel($manufacturers));
    }
}
