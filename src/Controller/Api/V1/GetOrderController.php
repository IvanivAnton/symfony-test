<?php

namespace App\Controller\Api\V1;

use App\Domain\UseCases;
use App\Requests;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GetOrderController extends AbstractController
{
    private UseCases\GetOrder $useCase;

    /**
     * @param UseCases\GetOrder $useCase
     */
    public function __construct(UseCases\GetOrder $useCase)
    {
        $this->useCase = $useCase;
    }


    #[Route(path: '/order/{id}', name: 'order.show', requirements: ['id' => '\d+'], methods: 'GET')]
    public function index(int $id): Response
    {
        $getOrderRequest = new Requests\GetOrderRequest($id);

        return $this->useCase->handle($getOrderRequest);
    }
}
