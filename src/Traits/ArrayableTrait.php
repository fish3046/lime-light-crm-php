<?php

namespace KevinEm\LimeLightCRM\Traits;

trait ArrayableTrait
{
    public function toArray(): array
    {
        $data = get_object_vars($this);

        // Only filter out nulls.  Leave 0 and blank strings
        $data = array_filter($data, function ($v) {
            return !is_null($v);
        });

        // Convert booleans to 1 or 0
        $data = array_map(function ($v) {
            if (is_bool($v)) {
                return $v == true ? 1 : 0;
            }

            return $v;
        }, $data);

        return $data;
    }
}
