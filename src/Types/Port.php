<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class Port extends AbstractType
{
    /**
     * @var int
     */
	public $portNumber;

    /**
     * @var string
     */
	public $protocol;
}