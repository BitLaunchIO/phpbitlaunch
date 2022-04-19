<?php

namespace PHPBitLaunch\Types;

abstract class AbstractType
{
    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->__set($key, $value);
            }
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}