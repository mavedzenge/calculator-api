<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property ContainerInterface $container
 */
trait ControllerResponseTrait
{
    protected function successResponse($data = [], int $status = Response::HTTP_OK, array $headers = []): JsonResponse
    {
        $json = $this->container->get('serializer')->serialize(['data' => $data], 'json', $context = []);

        return new JsonResponse($json, $status, $headers, true);
    }
}