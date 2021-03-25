<?php

namespace Kernel;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        $response = new Response();
        if (!empty($uri) && $uri[-1] === "/") {
            $response = $response
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        } else {
            $response->getBody()->write('Bonjour');
        }

        return $response;
    }
}
