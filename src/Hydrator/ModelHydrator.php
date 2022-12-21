<?php

namespace Brtdv\TwelveData\Hydrator;

use Psr\Http\Message\ResponseInterface;
use Brtdv\TwelveData\Exception\ApiException;
use Brtdv\TwelveData\Models\ApiResponse;
use Brtdv\TwelveData\Models\Status;

final class ModelHydrator implements Hydrator
{
    public function hydrate(ResponseInterface $response, string $class): ApiResponse
    {
        $body        = $response->getBody()->__toString();
        $contentType = $response->getHeaderLine('Content-Type');

        if (str_contains(strtolower($contentType), 'application/json') === false &&
            str_contains(strtolower($contentType), 'application/octet-stream') === false) {
            throw new HydrationException('Cannot hydrate response with Content-Type: '.$contentType);
        }

        $data = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

        if (isset($data['status']) && Status::ERROR === Status::from($data['status'])) {
            throw new ApiException($data['message'], $data['code'], null, Status::from($data['status']));
        }

        if (is_subclass_of($class, ApiResponse::class)) {
            $object = $class::create($data);
        } else {
            $object = new $class($data);
        }

        if (method_exists($object, 'setRawStream')) {
            $object->setRawStream($response->getBody());
        }

        return $object;
    }
}
