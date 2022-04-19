<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class History extends AbstractType
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $time;

    /**
     * @var string
     */
    public $description;
}