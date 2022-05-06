<?php

namespace KevinEm\LimeLightCRM\v1;

use ArrayAccess;
use JsonSerializable;

class Response implements ArrayAccess, JsonSerializable
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function isSuccess(): bool
    {
        $respCode = $this->data['response_code'];

        // 100 is traditional success
        //
        // 343 per the documentation is "Data Element Has Same Value As Value Passed No Update done
        // (Information ONLY, but still a success)".  I have seen this used when stopping a subscription
        // twice in a row.  I am considering this a success, as the object is in the desired state when
        // the operation is done, so we don't need to act further.
        return $respCode == 100 || $respCode == 343;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->data['offset'] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->data[$offset]);
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function jsonSerialize(): array
    {
        return $this->data;
    }
}
