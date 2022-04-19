<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\Proxy;

class Protection extends AbstractType
{
    /**
     * @var bool
     */
	public $enabled;

    /**
     * @var Proxy
     */
    public $proxy;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'proxy':
                        $this->__set($key, new Proxy($value));
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}