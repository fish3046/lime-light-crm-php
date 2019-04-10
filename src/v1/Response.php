<?php
namespace KevinEm\LimeLightCRM\v1;

use ArrayAccess;

class Response implements ArrayAccess
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function isSuccess(): bool
    {
        return $this->data['response_code'] == 100;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->data['offset'] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}