<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class HostImageVersion extends AbstractType
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
	public $description;

    /**
     * @var bool
     */
	public $passwordUnsupported;
}