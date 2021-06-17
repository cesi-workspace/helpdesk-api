<?php

namespace Kernel\Layer\Presentation;

use Symfony\Component\HttpFoundation\JsonResponse;

class JsonView implements View
{
    public function generate(ViewModel $viewModel): JsonResponse
    {
        return new JsonResponse([
            "status" => $viewModel->getStatus(),
            "body" => $viewModel->getBody()
        ], $viewModel->getStatus());
    }
}
