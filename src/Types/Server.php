<?php

namespace PHPBitLaunch\Types;

use PHPBitLaunch\Types\AbstractType;
use PHPBitLaunch\Types\Protection;

class Server extends AbstractType
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
     * @var int
     */
	public $host;

    /**
     * @var string
     */
	public $ipv4;

    /**
     * @var string
     */
	public $region;

    /**
     * @var string
     */
	public $size;

    /**
     * @var string
     */
	public $sizeDescription;

    /**
     * @var string
     */
	public $image;

    /**
     * @var string
     */
	public $imageDescription;

    /**
     * @var string
     */
	public $created;

    /**
     * @var int
     */
	public $rate;

    /**
     * @var int
     */
	public $bandwidthUsed;

    /**
     * @var int
     */
	public $bandwidthAllowance;

    /**
     * @var string
     */
	public $status;

    /**
     * @var string
     */
	public $errorText;

    /**
     * @var bool
     */
	public $backupsEnabled;

    /**
     * @var string
     */
	public $version;

    /**
     * @var bool
     */
	public $abuse;

    /**
     * @var int
     */
	public $diskGB;

    /**
     * @var Protection
     */
    public $protection;

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                // Check if property needs decoding as object
                switch ($key) {
                    case 'protection':
                        $this->__set($key, new Protection($value));
                        break;
                    
                    default:
                        $this->__set($key, $value);
                        break;
                }
            }
        }
    }
}