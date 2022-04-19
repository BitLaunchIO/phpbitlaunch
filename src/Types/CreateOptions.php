<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\HostImage;
use PHPBitLaunch\Types\HostRegion;
use PHPBitLaunch\Types\HostSize;
use PHPBitLaunch\Types\HostPlanType;

class CreateOptions extends AbstractType
{
    /**
     * @var int
     */
    public $hostID;

    /**
     * @var HostImage[]
     */
    public $image;

    /**
     * @var HostRegion[]
     */
    public $region;

    /**
     * @var HostSize[]
     */
    public $size;

    /**
     * @var bool
     */
    public $available;

    /**
     * @var HostOptions
     */
    public $hostOptions;

    /**
     * @var HostPlanType[]
     */
    public $planTypes;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'image':
                        $image = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $image[$k] = new HostImage($v);
                            }
                        }

                        $this->__set($key, $image);
                        break;
                    
                    case 'region':
                        $region = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $region[$k] = new HostRegion($v);
                            }
                        }

                        $this->__set($key, $region);
                        break;
                    
                    case 'size':
                        $size = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $size[$k] = new HostSize($v);
                            }
                        }

                        $this->__set($key, $size);
                        break;
                    
                    case 'hostOptions':
                        $this->__set($key, new HostOptions($value));
                        break;
                    
                    case 'planTypes':
                        $planTypes = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $planTypes[$k] = new HostPlanType($v);
                            }
                        }

                        $this->__set($key, $planTypes);
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}