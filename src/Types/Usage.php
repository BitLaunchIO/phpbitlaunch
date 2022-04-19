<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class Usage extends AbstractType
{
    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $start;

    /**
     * @var string
     */
    public $end;

    /**
     * @var int
     */
    public $cost;

    /**
     * @var int
     */
    public $hours;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var string
     */
    public $type;
}