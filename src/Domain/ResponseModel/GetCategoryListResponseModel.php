<?php

namespace App\Domain\ResponseModel;

final class GetCategoryListResponseModel
{
    private array $categories;

    /**
     * @param array $categories
     */
    public function __construct(array $categories = [])
    {
        $this->categories = $categories;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }



}
