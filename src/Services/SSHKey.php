<?php

namespace PHPBitLaunch\Services;

use PHPBitLaunch\Types as Types;
use PHPBitLaunch\Exceptions\RuntimeException;

class SSHKey extends AbstractService
{
    /**
     * @return Types\SSHKey[]|null
     * 
     * @throws RuntimeException
     */
    public function list(): array
    {
        $response = $this->doGet('ssh-keys')->keys;

        $keys = [];

        // Create array from response
        if ($response) {
            foreach ($response as $key => $value) {
                $keys[$key] = new Types\SSHKey($value);
            }
        }

        return $keys;
    }

    /**
     * @param string $id The ID of the SSHKey to delete
     * 
     * @return void
     * 
     * @throws RuntimeException
     */
    public function delete(string $id): void
    {
        $this->doDelete('ssh-keys/' . $id);

        return;
    }

    /**
     * @param string $name A unique name for the SSHKey
     * @param string $content The content of the SSH Public Key
     * 
     * @return Types\SSHKey|null
     * 
     * @throws RuntimeException
     */
    public function create(string $name, string $content): Types\SSHKey
    {
        // Setup body
        $body = [
            'name' => $name,
            'content' => $content,
        ];

        return new Types\SSHKey($this->doPost('ssh-keys', [], $body));
    }
}