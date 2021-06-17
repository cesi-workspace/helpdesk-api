<?php

namespace Kernel\Layer\Presentation;

class ViewModel
{
    private int $status;
    private mixed $body;

    public function __construct($body = "", int $status = 200)
    {
        $this->body = $body;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getBody(): mixed
    {
        return $this->body;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param mixed $body
     */
    public function setBody(mixed $body): void
    {
        $this->body = $body;
    }
}
