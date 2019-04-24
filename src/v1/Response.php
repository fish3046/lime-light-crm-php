<?php
namespace KevinEm\LimeLightCRM\v1;

use ArrayAccess;
use JsonSerializable;

class Response implements ArrayAccess, JsonSerializable
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

    public function toArray(): array
    {
        return $this->data;
    }

    public function jsonSerialize()
    {
        return $this->data;
    }
}