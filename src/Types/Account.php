<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class Account extends AbstractType
{
    /**
     * @var string
     */
    public $id;
    
    /**
     * @var string
     */
    public $email;
    
    /**
     * @var bool
     */
    public $emailConfirmed;
    
    /**
     * @var string
     */
    public $created;
    
    /**
     * @var int
     */
    public $used;
    
    /**
     * @var int
     */
    public $limit;
    
    /**
     * @var bool
     */
    public $twofa;
    
    /**
     * @var int
     */
    public $balance;
    
    /**
     * @var int
     */
    public $costPerHr;
    
    /**
     * @var int
     */
    public $billingAlert;
    
    /**
     * @var int
     */
    public $negativeAllowance;
}
