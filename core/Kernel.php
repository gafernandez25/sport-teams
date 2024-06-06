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
    public function handle(Request $request): ?Response
    {
        $router = Router::create();

        try {
            $response = $router->routeRequest($request);

            if ($response === null) {
                return null;
            }

            if ($response instanceof View) {
                return new Response(
                    content: $response->getHtml()
                );
            }

            return $response;
        } catch (RouteNotFoundException $e) {
            throw $e;
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        } catch (MethodNotAllowedException) {
            return new JsonResponse(status: Response::HTTP_METHOD_NOT_ALLOWED);
        }
    }
}