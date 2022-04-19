<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\Transaction;

class TransactionHistory extends AbstractType
{
    /**
     * @var Transaction[]
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
                switch ($key) {
                    // Check if property needs decoding as object
                    case 'history':
                        $history = [];

                        if ($value) {
                            foreach ($value as $k => $v) {
                                $history[$k] = new Transaction($v);
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