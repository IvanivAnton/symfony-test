<?php

namespace App\Controller\Api\V1;

use App\Domain\UseCases\GetGoodList;
use App\Requests\GetGoodsListRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GoodListController extends AbstractController
{
    private GetGoodList $useCase;

    public function __construct(GetGoodList $getGoodsList)
    {
        $this->useCase = $getGoodsList;
    }


    #[Route(path:'/good/', name: 'good.list', methods: 'GET')]
    public function __invoke(GetGoodsListRequest $request): JsonResponse
    {
        $request->validate();
        return $this->useCase->handle($request);
    }
}
