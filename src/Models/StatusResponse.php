<?php

namespace Brtdv\TwelveData\Models;

trait StatusResponse
{
    private ?string $status;

    public function getStatus(): ?string
    {
        return $this->status;
    }
}
