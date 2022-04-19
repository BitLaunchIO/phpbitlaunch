<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;

class Transaction extends AbstractType
{
    /**
     * @var string
     */
	public $id;

    /**
     * @var string
     */
	public $userid;

    /**
     * @var string
     */
	public $date;

    /**
     * @var string
     */
	public $address;

    /**
     * @var string
     */
	public $cryptoSymbol;

    /**
     * @var float
     */
	public $amountUsd;

    /**
     * @var string
     */
	public $amountCrypto;

    /**
     * @var string
     */
	public $status;

    /**
     * @var string
     */
	public $paymentPath;

    /**
     * @var string
     */
	public $processorid;
}