<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{

    /**
     * @Route("/blog", name="blog_list", methods={"GET"})
     */
    public function index(Request $request)
    {
        return new JsonResponse(['body' => ['test' => true]], 400);
    }
}
