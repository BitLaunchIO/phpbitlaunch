<?php

namespace PHPBitLaunch\Services;

use PHPBitLaunch\Types as Types;
use PHPBitLaunch\Exceptions\RuntimeException;

class Server extends AbstractService
{
    /**
     * @param Types\ServerCreateOptions $opts Server create options
     * 
     * @return Types\Server|null
     * 
     * @throws RuntimeException
     */
    public function create(Types\ServerCreateOptions $opts): Types\Server
    {
        // Setup body
        $body = [
            'server' => $opts,
        ];

        return new Types\Server($this->doPost('servers', [], $body));
    }

    /**
     * @param string $id Server ID
     * 
     * @return Types\Server|null
     * 
     * @throws RuntimeException
     */
    public function show(string $id): Types\Server
    {
        return new Types\Server($this->doGet('servers/' . $id, [])->server);
    }

    /**
     * @return Types\Server[]|null
     * 
     * @throws RuntimeException
     */
    public function list(): array
    {
        $response = $this->doGet('servers', []);

        $servers = [];

        // Create array from response
        if ($response) {
            foreach ($response as $key => $value) {
                $servers[$key] = new Types\Server($value);
            }
        }

        return $servers;
    }

    /**
     * @param string $id Server ID
     * 
     * @return void
     * 
     * @throws RuntimeException
     */
    public function destroy(string $id): void
    {
        $this->doDelete('servers/' . $id, []);

        return;
    }

    /**
     * @param string $id Server ID
     * @param string $hostImageID Image ID
     * @param string $imageDescription Image description
     * 
     * @return void
     * 
     * @throws RuntimeException
     */
    public function rebuild(string $id, string $hostImageID, string $imageDescription): void
    {
        // Setup body
        $body = [
            'hostImageID' => $hostImageID,
            'imageDescription' => $imageDescription,
        ];

        $this->doPost('servers/' . $id . '/rebuild', [], $body);

        return;
    }

    /**
     * @param string $id Server ID
     * @param string $sizeID Size ID
     * 
     * @return void
     * 
     * @throws RuntimeException
     */
    public function resize(string $id, string $sizeID): void
    {
        // Setup body
        $body = [
            'size' => $sizeID,
        ];

        $this->doPost('servers/' . $id . '/resize', [], $body);

        return;
    }

    /**
     * @param string $id Server ID
     * 
     * @return Types\CreateOptions
     * 
     * @throws RuntimeException
     */
    public function resizeAvailability(string $id): Types\CreateOptions
    {
        return new Types\CreateOptions($this->doGet('servers/' . $id . '/resize-availability', []));
    }

    /**
     * @param string $id Server ID
     * 
     * @return void
     * 
     * @throws RuntimeException
     */
    public function restart(string $id): void
    {
        $this->doPost('servers/' . $id . '/restart', [], []);

        return;
    }

    /**
     * @param string $id Server ID
     * 
     * @return void
     * 
     * @throws RuntimeException
     */
    public function stop(string $id): void
    {
        $this->doPost('servers/' . $id . '/stop', [], []);

        return;
    }

    /**
     * @param string $id Server ID
     * @param bool $enabled Whether to enable protection
     * 
     * @return Types\Server|null
     * 
     * @throws RuntimeException
     */
    public function protect(string $id, bool $enabled): Types\Server
    {
        // Setup body
        $body = [
            'enabled' => $enabled,
            'region' => function() use ($enabled) {
                if ($enabled) {
                    return 'bvm-lux';
                }

                return '';
            },
        ];

        return new Types\Server($this->doPost('servers/' . $id . '/protection', [], $body));
    }

    /**
     * @param string $id Server ID
     * @param Types\Port[] $ports The ports to use
     * 
     * @return Types\Server|null
     * 
     * @throws RuntimeException
     */
    public function setPorts(string $id, array $ports): Types\Server
    {
        return new Types\Server($this->doPost('servers/' . $id . '/protection/ports', [], $ports));
    }
}