<?php
namespace KevinEm\LimeLightCRM\Exceptions;

class LimeLightCRMGenericException extends LimeLightCRMException
{
    function getExceptionMessage($code)
    {
        return $this->message;
    }
}