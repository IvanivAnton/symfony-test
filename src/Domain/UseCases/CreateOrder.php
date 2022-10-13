<?php

namespace App\Domain\UseCases;

use App\Domain\Output\CreateOrderOutputInterface;
use App\Domain\Output\GetCategoryListOutputInterface;
use App\Entity\Order;
use App\Repository\GoodRepository;
use App\Repository\OrderRepository;
use App\Requests\CreateOrderRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateOrder
{
    private OrderRepository $orderRepository;
    private GoodRepository $goodRepository;
    private CreateOrderOutputInterface $output;

    /**
     * @param OrderRepository $orderRepository
     * @param GoodRepository $goodRepository
     * @param CreateOrderOutputInterface $output
     */
    public function __construct(OrderRepository $orderRepository, GoodRepository $goodRepository, CreateOrderOutputInterface $output)
    {
        $this->orderRepository = $orderRepository;
        $this->goodRepository = $goodRepository;
        $this->output = $output;
    }


    public function handle(CreateOrderRequest $request): Response
    {
        $goodsIds = $request->getGoods();

        $order = new Order();

        $order->setStatus('Created');
        foreach ($goodsIds as $goodId)
        {
            $good = $this->goodRepository->find($goodId);
            if(empty($good)) {
                return $this->output->someGoodsDoNotExist();
            }

            $order->addGood($good);
        }

        $this->orderRepository->save($order, true);

        return $this->output->successfullyCreated();
    }
}
