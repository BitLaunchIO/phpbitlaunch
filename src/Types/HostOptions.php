<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class HostOptions extends AbstractType
{
    /**
     * @var bool
     */
	public $rebuild;

    /**
     * @var bool
     */
	public $resize;

    /**
     * @var bool
     */
	public $backups;

    /**
     * @var bool
     */
	public $userScript;
}