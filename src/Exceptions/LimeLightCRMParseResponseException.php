<?php
namespace KevinEm\LimeLightCRM\Exceptions;

/**
 * Thrown when the response body from limelight is not understandable
 *
 * @package KevinEm\LimeLightCRM\Exceptions
 */
class LimeLightCRMParseResponseException extends LimeLightCRMException
{
    function getExceptionMessage($code)
    {
        return $this->message;
    }
}