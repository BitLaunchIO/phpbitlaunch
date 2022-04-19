<?php

namespace PHPBitLaunch\Services;

use PHPBitLaunch\Types as Types;
use PHPBitLaunch\Exceptions\RuntimeException;

class Account extends AbstractService
{
    /**
     * @return Types\Account|null
     * 
     * @throws RuntimeException
     */
    public function show(): Types\Account
    {
        return new Types\Account($this->doGet('user'));
    }

    /**
     * @param string $period Optional period filter
     * 
     * @return Types\AccountUsage|null
     * 
     * @throws RuntimeException
     */
    public function usage(string $period = 'latest'): Types\AccountUsage
    {
        // Set default period
        if ($period === '') {
            $period = 'latest';
        }

        // Setup query params
        $params = [
            'period' => $period,
        ];

        return new Types\AccountUsage($this->doGet('usage', $params));
    }

    /**
     * @param int $page Optional page filter
     * @param int $items Optional items per page filter
     * 
     * @return Types\AccountHistory|null
     * 
     * @throws RuntimeException
     */
    public function history(int $page = 1, int $items = 10): Types\AccountHistory
    {
        // Default page
        if ($page < 1) {
            $page = 1;
        }

        // Default items per page
        if ($items < 1) {
            $items = 10;
        }

        // Setup query params
        $params = [
            'page' => $page,
            'items' => $items,
        ];

        return new Types\AccountHistory($this->doGet('security/history', $params));
    }
}