<?php

namespace App\Domain\UseCases;

use App\Entity\Order;
use App\Repository\GoodRepository;
use App\Repository\OrderRepository;
use App\Requests\CreateOrderRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateOrder
{
    private OrderRepository $orderRepository;
    private GoodRepository $goodRepository;

    /**
     * @param OrderRepository $orderRepository
     * @param GoodRepository $goodRepository
     */
    public function __construct(OrderRepository $orderRepository, GoodRepository $goodRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->goodRepository = $goodRepository;
    }


    public function handle(CreateOrderRequest $request): JsonResponse
    {
        $goodsIds = $request->getGoods();

        $order = new Order();

        $order->setStatus('Created');
        foreach ($goodsIds as $goodId)
        {
            $good = $this->goodRepository->find($goodId);
            if(empty($good)) {
                return new JsonResponse(['message' => "Some goods do not exist"], 422);
            }

            $order->addGood($good);
        }

        $this->orderRepository->save($order, true);

        return new JsonResponse(null, 204);
    }
}
