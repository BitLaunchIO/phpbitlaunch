<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\Usage;

class AccountUsage extends AbstractType
{
    /**
     * @var Usage[]
     */
    public $serverUsage;

    /**
     * @var Usage[]
     */
    public $backupUsage;

    /**
     * @var Usage[]
     */
    public $bandwidthUsage;

    /**
     * @var Usage[]
     */
    public $protectionUsage;

    /**
     * @var int
     */
    public $totalUsd;

    /**
     * @var string
     */
    public $prevMonth;

    /**
     * @var string
     */
    public $thisMonth;

    /**
     * @var string
     */
    public $nextMonth;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'serverUsage':
                    case 'backupUsage':
                    case 'bandwidthUsage':
                    case 'protectionUsage':
                        $usage = [];
                        
                        if ($value) {
                            foreach ($value as $k => $v) {
                                $usage[$k] = new Usage($v);
                            }
                        }

                        $this->__set($key, $usage);
                        break;
                        
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}