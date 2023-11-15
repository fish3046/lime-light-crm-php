<?php

namespace KevinEm\LimeLightCRM\Exceptions;

class LimeLightCRMGenericException extends LimeLightCRMException
{
    public function getExceptionMessage(int $code): string
    {
        return $this->message;
    }
}
