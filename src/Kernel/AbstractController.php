<?php

namespace Kernel;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractController
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function getRequest(): Request
    {
        return $this->request;
    }
}
