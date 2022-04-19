<?php

namespace PHPBitLaunch\Services;

use PHPBitLaunch\Types as Types;
use PHPBitLaunch\Exceptions\RuntimeException;

class Transaction extends AbstractService
{
    /**
     * @param int $page Optional page filter
     * @param int $items Optional items per page filter
     * 
     * @return Types\TransactionHistory|null
     * 
     * @throws RuntimeException
     */
    public function list(int $page = 1, int $items = 10): Types\TransactionHistory
    {
        // Setup query params
        $params = [
            'page' => $page,
            'items' => $items,
        ];

        return new Types\TransactionHistory($this->doGet('transactions', $params));
    }

    /**
     * @param string $id The ID of the transaction
     * 
     * @return Types\Transaction|null
     * 
     * @throws RuntimeException
     */
    public function show(string $id): Types\Transaction
    {
        return new Types\Transaction($this->doGet('transactions/' . $id));
    }

    /**
     * @param int $amountUsd The amount in USD for the transaction
     * @param int $cryptoSymbol Optional type of crypto to use
     * 
     * @return Types\Transaction|null
     * 
     * @throws RuntimeException
     */
    public function create(int $amountUsd, string $cryptoSymbol = 'BTC'): Types\Transaction
    {
        // Setup body
        $body = [
            'amountUsd' => $amountUsd,
            'cryptoSymbol' => $cryptoSymbol,
        ];

        return new Types\Transaction($this->doPost('transactions', [], $body));
    }
}