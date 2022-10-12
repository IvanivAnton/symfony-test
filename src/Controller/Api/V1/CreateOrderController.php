<?php

namespace App\Controller\Api\V1;

use App\Domain\UseCases;
use App\Requests;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateOrderController extends AbstractController
{
    private UseCases\CreateOrder $useCase;

    /**
     * @param UseCases\CreateOrder $useCase
     */
    public function __construct(UseCases\CreateOrder $useCase)
    {
        $this->useCase = $useCase;
    }


    #[Route(path:'/order/', name: 'order.create', methods: 'POST')]
    public function index(Requests\CreateOrderRequest $request): JsonResponse
    {
        $request->validate();

        return $this->useCase->handle($request);
    }
}
