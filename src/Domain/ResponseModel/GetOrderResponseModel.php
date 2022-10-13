<?php

namespace App\Domain\ResponseModel;

use App\Entity\Order;

class GetOrderResponseModel
{
    public function __construct(private ?Order $order = null)
    {
    }

    /**
     * @return Order|null
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

}

