<?php

namespace App\Domain\ResponseModel;

final class GetManufacturerListResponseModel
{
    private ?array $manufacturers;

    /**
     * @param array|null $manufacturers
     */
    public function __construct(?array $manufacturers = [])
    {
        $this->manufacturers = $manufacturers;
    }

    /**
     * @return array|null
     */
    public function getManufacturers(): ?array
    {
        return $this->manufacturers;
    }

}
