<?php

namespace App\Controller\Api\V1;

use App\Domain\UseCases\GetManufacturerList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ManufacturerListController extends AbstractController
{
    private GetManufacturerList $getManufacturerList;

    /**
     * @param GetManufacturerList $getManufacturerList
     */
    public function __construct(GetManufacturerList $getManufacturerList)
    {
        $this->getManufacturerList = $getManufacturerList;
    }


    #[Route(path:'/manufacturer/', name: 'manufacturer.list', methods: 'GET')]
    public function index(): JsonResponse
    {
        return $this->getManufacturerList->handle();
    }
}
