<?php

namespace App\Domain\UseCases;

use App\Domain\Output\GetOrderOutputInterface;
use App\Domain\ResponseModel\GetOrderResponseModel;
use App\Repository\OrderRepository;
use App\Requests\GetOrderRequest;
use Symfony\Component\HttpFoundation\Response;

class GetOrder
{
    private OrderRepository $repository;
    private GetOrderOutputInterface $output;

    /**
     * @param OrderRepository $repository
     * @param GetOrderOutputInterface $output
     */
    public function __construct(OrderRepository $repository, GetOrderOutputInterface $output)
    {
        $this->repository = $repository;
        $this->output = $output;
    }


    public function handle(GetOrderRequest $requestData): Response
    {
        $order = $this->repository->find($requestData->getId());
        if(empty($order)) {
            return $this->output->noSuchOrder(new GetOrderResponseModel());
        }

        return $this->output->successfullyFetched(new GetOrderResponseModel($order));
    }
}
