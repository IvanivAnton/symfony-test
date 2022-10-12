<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints;

class GetOrderRequest
{
    #[Constraints\Positive]
    public int $id;

    /**
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}
