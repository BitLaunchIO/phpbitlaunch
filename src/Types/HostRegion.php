<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\HostSubRegion;

class HostRegion extends AbstractType
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $iso;

    /**
     * @var HostSubRegion
     */
    public $subregion;

    /**
     * @var HostSubRegion[]
     */
    public $subregions;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'subregions':
                        $subregions = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $subregions[$k] = new HostSubRegion($v);
                            }
                        }

                        $this->__set($key, $subregions);
                        break;
                    
                    case 'subregion':
                        $this->__set($key, new HostSubRegion($value));
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}