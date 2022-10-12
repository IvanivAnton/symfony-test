<?php

namespace App\Domain\UseCases;

use App\Repository\GoodRepository;
use App\Requests\GetGoodsListRequest;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GetGoodList
{
    private GoodRepository $repository;
    private SerializerInterface $serializer;

    public function __construct(GoodRepository $repository, SerializerInterface $serializer)
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }


    public function handle(GetGoodsListRequest $requestModel): JsonResponse
    {
        $criteria = new Criteria();
        if (!empty($requestModel->getCategoryId())) {
            $criteria->where(Criteria::expr()->eq('category_id', $requestModel->getCategoryId()));
        }
        if (!empty($requestModel->getManufacturerId())) {
            $criteria->where(Criteria::expr()->eq('manufacturer_id', $requestModel->getManufacturerId()));
        }
        if (!empty($requestModel->getPriceFrom())) {
            $criteria->where(Criteria::expr()->gte('price', $requestModel->getPriceFrom()));
        }
        if (!empty($requestModel->getPriceTo())) {
            $criteria->where(Criteria::expr()->lte('price', $requestModel->getPriceTo()));
        }
        if (!empty($requestModel->getYear())) {
            $criteria->where(Criteria::expr()->eq('year', $requestModel->getYear()));
        }

        $goods = $this->repository->findByCriteria($criteria);
        return JsonResponse::fromJsonString(
            $this->serializer->serialize(
                $goods,
                'json',
                ['groups' => ['read']]
            )
        );
    }
}
