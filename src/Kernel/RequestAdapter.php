<?php

namespace Kernel;

use Symfony\Component\HttpFoundation\Request;

class RequestAdapter
{

    private Request $request;
    private array $parameters;

    public function __construct(Request $request, array $parameters)
    {
        $this->request = $request;
        $this->parameters = $parameters;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
