<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class HostSubRegion extends AbstractType
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
     * @var string
     */
	public $slug;

    /**
     * @var string[]
     */
	public $unavailableSizes;
}