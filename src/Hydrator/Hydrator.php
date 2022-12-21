<?php

namespace Brtdv\TwelveData\Hydrator;

use Psr\Http\Message\ResponseInterface;

interface Hydrator
{
    public function hydrate(ResponseInterface $response, string $class);
}
