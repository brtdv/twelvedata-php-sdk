<?php

namespace Brtdv\TwelveData\Models;

trait StatusResponse
{
    private ?Status $status;

    public function getStatus(): ?Status
    {
        return $this->status;
    }
}
