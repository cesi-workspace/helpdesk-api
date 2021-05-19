<?php

namespace App\Controller;

use Kernel\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/blog", name="blog_list", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        return new JsonResponse(['body' => ['test' => true]], 400);
    }
}
