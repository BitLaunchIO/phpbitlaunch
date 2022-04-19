<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\HostDisks;

class HostSize extends AbstractType
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $slug;

    /**
     * @var int
     */
    public $bandwidthGB;

    /**
     * @var int
     */
    public $cpuCount;

    /**
     * @var int
     */
    public $diskGB;

    /**
     * @var HostDisks[]
     */
    public $disks;

    /**
     * @var int
     */
    public $memoryMB;

    /**
     * @var int
     */
    public $costPerHr;

    /**
     * @var float
     */
    public $costPerMonth;

    /**
     * @var string
     */
    public $planType;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'disks':
                        $disks = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $disks[$k] = new HostDisks($v);
                            }
                        }

                        $this->__set($key, $disks);
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}