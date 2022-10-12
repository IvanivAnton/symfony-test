<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CreateOrderRequest extends BaseRequest
{
    #[Type('array')]
    #[NotBlank]
    protected $goods;

    /**
     * @return mixed
     */
    public function getGoods(): mixed
    {
        return $this->goods;
    }
}
