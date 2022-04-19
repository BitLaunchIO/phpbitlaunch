<?php

namespace PHPBitLaunch;

use PHPBitLaunch\Services\Account;
use PHPBitLaunch\Services\CreateOptions;
use PHPBitLaunch\Services\Server;
use PHPBitLaunch\Services\SSHKey;
use PHPBitLaunch\Services\Transaction;

class Client
{
    protected const BASE_URI = 'https://app.bitlaunch.io/api/';

    protected const VERSION = '1.0.0';
    
    protected const USER_AGENT = 'phpbitlaunch/' . self::VERSION;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @param string $token A BitLaunch API Key
     */
    public function __construct(string $token = '')
    {
        $this->apiKey = $token;
    }

    /**
     * @return Account Service 
     */
    public function account(): Account
    {
        return new Account($this);
    }

    /**
     * @return CreateOptions Service 
     */
    public function createOptions(): CreateOptions
    {
        return new CreateOptions($this);
    }

    /**
     * @return SSHKey Service 
     */
    public function sshKey(): SSHKey
    {
        return new SSHKey($this);
    }

    /**
     * @return Transaction Service 
     */
    public function transaction(): Transaction
    {
        return new Transaction($this);
    }

    /**
     * @return Server Service 
     */
    public function server(): Server
    {
        return new Server($this);
    }
}