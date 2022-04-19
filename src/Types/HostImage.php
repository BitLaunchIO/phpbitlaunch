<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\HostImageVersion;

class HostImage extends AbstractType
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
    public $type;

    /**
     * @var int
     */
    public $minDiskSize;

    /**
     * @var string[]
     */
    public $unavailableRegions;

    /**
     * @var HostImageVersion
     */
    public $version;

    /**
     * @var HostImageVersion[]
     */
    public $versions;

    /**
     * @var int
     */
    public $extraCostPerMonth;

    /**
     * @var bool
     */
    public $windows;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'versions':
                        $versions = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $versions[$k] = new HostImageVersion($v);
                            }
                        }

                        $this->__set($key, $versions);
                        break;
                    
                    case 'version':
                        $this->__set($key, new HostImageVersion($value));
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}