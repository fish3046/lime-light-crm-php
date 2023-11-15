<?php

namespace KevinEm\LimeLightCRM\Exceptions;

/**
 * Thrown when the response body from limelight is not understandable
 *
 * @package KevinEm\LimeLightCRM\Exceptions
 */
class LimeLightCRMParseResponseException extends LimeLightCRMException
{
    public function getExceptionMessage(int $code): string
    {
        return $this->message;
    }
}
