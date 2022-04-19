<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\History;

class AccountHistory extends AbstractType
{
    /**
     * @var History[]
     */
    public $history;

    /**
     * @var int
     */
    public $total;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'history':
                        $history = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $history[$k] = new History($v);
                            }
                        }

                        $this->__set($key, $history);
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}