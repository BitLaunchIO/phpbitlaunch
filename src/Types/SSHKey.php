<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class SSHKey extends AbstractType
{
    /**
     * @var string
     */
	public $id;

    /**
     * @var string
     */
	public $name;

    /**
     * @var string
     */
	public $fingerprint;

    /**
     * @var string
     */
	public $content;

    /**
     * @var string
     */
	public $created;
}