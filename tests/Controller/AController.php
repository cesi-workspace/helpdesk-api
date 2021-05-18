<?php

namespace Tests\Controller;

use Kernel\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AController extends AbstractController
{

    /**
     * @Route("/test", name="test_get", methods={"GET"})
     */
    public function aGetAction(): JsonResponse
    {
        return new JsonResponse([], 200);
    }
}
