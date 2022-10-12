<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints;

class GetGoodsListRequest extends BaseRequest
{
    #[Constraints\Positive]
    public ?int $category_id = null;

    #[Constraints\Positive]
    public ?int $manufacturer_id = null;

    #[Constraints\Positive]
    public ?int $year = null;

    #[Constraints\PositiveOrZero]
    public ?float $price_from = null;

    #[Constraints\PositiveOrZero]
    public ?float $price_to = null;

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    /**
     * @return int|null
     */
    public function getManufacturerId(): ?int
    {
        return $this->manufacturer_id;
    }

    /**
     * @return int|null
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @return float|null
     */
    public function getPriceFrom(): ?float
    {
        return $this->price_from;
    }

    /**
     * @return float|null
     */
    public function getPriceTo(): ?float
    {
        return $this->price_to;
    }


}
