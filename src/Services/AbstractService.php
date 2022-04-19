<?php

namespace PHPBitLaunch\Services;

use PHPBitLaunch\Client;
use PHPBitLaunch\Exceptions\RuntimeException;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

abstract class AbstractService extends Client
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var GuzzleClient
     */
    private $httpClient;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->httpClient = new GuzzleClient([
            'base_uri' => Client::BASE_URI,
        ]);
    }

    /**
     * @param string $endpoint BitLaunch API endpoint
     * @param array $params URL Querey parameters
     * 
     * @return \stdClass JSON decoded response
     */
    protected function doGet(string $endpoint, array $params = []): \stdClass
    {
        return json_decode($this->doRequest('GET', $endpoint, $params)) ?? new \stdClass();
    }

    /**
     * @param string $endpoint BitLaunch API endpoint
     * @param array $params URL Querey parameters
     * @param array $data Request Body
     * 
     * @return \stdClass JSON decoded response
     */
    protected function doPost(string $endpoint, array $params = [], array $data = []): \stdClass
    {
        return json_decode($this->doRequest('POST', $endpoint, $params, $data)) ?? new \stdClass();
    }

    /**
     * @param string $endpoint BitLaunch API endpoint
     * @param array $params URL Querey parameters
     * 
     * @return \stdClass JSON decoded response
     */
    protected function doDelete(string $endpoint, array $params = []): \stdClass
    {
        return json_decode($this->doRequest('DELETE', $endpoint, $params)) ?? new \stdClass();
    }

    /**
     * @param string $method Request method to use
     * @param string $endpoint BitLaunch API endpoint
     * @param array $params URL Querey parameters
     * @param array $data Request Body
     * 
     * @return string JSON response
     */
    private function doRequest(string $method, string $endpoint, array $params = [], array $data = []): string
    {
        try {
            // Build query params string from array
            $queryParams = $this->buildQueryParams($params);

            // Build body string from array
            $body = $this->buildBody($data);

            // Do the request
            $response = $this->httpClient->request($method, $endpoint . $queryParams, [
                'body' => $body,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->apiKey,
                    'Content-Type' => 'application/json',
                    'User-Agent' => Client::USER_AGENT,
                ],
            ]);

            // Return the response body or empty string
            return $response->getBody() ?? '';
        } catch (RequestException $e) {
            // Catch GuzzleHttp exception and throw PHPBitlaunch exception
            throw new RuntimeException($e->getResponse()->getBody(), $e->getResponse()->getStatusCode());
        }
    }

    /**
     * @param array $params URL Query parameters
     * 
     * @return string URL Query parameter string
     */
    private function buildQueryParams(array $params): string
    {
        // If no parameters passed, return empty string
        if (\count($params) === 0) {
            return '';
        }

        return '?' . \http_build_query($params, '', '&', \PHP_QUERY_RFC3986);
    }

    /**
     * @param array $data Request body array
     * 
     * @return string JSON encoded string
     */
    private function buildBody(array $data): string
    {
        // If no data passed, return empty string
        if (\count($data) === 0) {
            return '';
        }

        return \json_encode($data) ?? '';
    }
}