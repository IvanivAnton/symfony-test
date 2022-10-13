<?php

namespace App\Controller\Api\V1;

use App\Domain\UseCases\GetCategoryList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryListController extends AbstractController
{
    private GetCategoryList $useCase;

    /**
     * @param GetCategoryList $categoryList
     */
    public function __construct(GetCategoryList $categoryList)
    {
        $this->useCase = $categoryList;
    }


    #[Route(path:'/category/', name: 'category.list', methods: 'GET')]
    public function index(): Response
    {
        return $this->useCase->handle();
    }
}
