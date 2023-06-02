<?php

namespace PHPBitLaunch\Services;

use PHPBitLaunch\Types as Types;
use PHPBitLaunch\Exceptions\RuntimeException;

class CreateOptions extends AbstractService
{
    /**
     * @param int $hostID ID of the hosting provider
     * 
     * @return Types\CreateOptions|null
     * 
     * @throws RuntimeException
     */
    public function show(int $hostID): Types\CreateOptions
    {
        return new Types\CreateOptions($this->doGet('hosts-create-options/' . $hostID));
    }
}