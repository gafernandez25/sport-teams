<?php

declare(strict_types=1);

namespace Core;

use App\Exception\MethodNotAllowedException;
use App\Exception\RouteNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    public function handle(Request $request): Response
    {
        $router = Router::create();

        try {
            $response = $router->routeRequest($request);

            return ($response !== null) ? $response : new JsonResponse();
        } catch (RouteNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        } catch (MethodNotAllowedException) {
            return new JsonResponse(status: Response::HTTP_METHOD_NOT_ALLOWED);
        }
    }
}