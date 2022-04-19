<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class HostDisks extends AbstractType
{
    /**
     * @var string
     */
	public $type;

    /**
     * @var int
     */
	public $count;

    /**
     * @var string
     */
	public $size;

    /**
     * @var string
     */
	public $unit;
}