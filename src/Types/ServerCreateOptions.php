<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class ServerCreateOptions extends AbstractType
{
    /**
     * @var string
     */
	public $name;
    
    /**
     * @var int
     */
	public $hostID;

    /**
     * @var string
     */
	public $hostImageID;

    /**
     * @var string
     */
	public $sizeID;

    /**
     * @var string
     */
	public $regionID;

    /**
     * @var string[]|null
     */
	public $sshKeys;

    /**
     * @var string|null
     */
	public $password;

    /**
     * @var string|null
     */
	public $initscript;
}