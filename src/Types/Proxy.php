<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\Port;

class Proxy extends AbstractType
{
    /**
     * @var string
     */
	public $ip;

    /**
     * @var string
     */
    public $region;

    /**
     * @var Port[]
     */
	public $ports;

    /**
     * @var string
     */
	public $target;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'ports':
                        $ports = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $ports[$k] = new Port($v);
                            }
                        }

                        $this->__set($key, $ports);
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}