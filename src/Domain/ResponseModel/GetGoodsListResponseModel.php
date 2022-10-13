<?php

namespace App\Domain\ResponseModel;

final class GetGoodsListResponseModel
{
    private ?array $goods;

    /**
     * @param array|null $goods
     */
    public function __construct(?array $goods = [])
    {
        $this->goods = $goods;
    }

    /**
     * @return array|null
     */
    public function getGoods(): ?array
    {
        return $this->goods;
    }



}
