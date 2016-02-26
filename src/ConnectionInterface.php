<?php
namespace Blesta\ResellerApi;

/**
 * Connection Interface
 */
interface ConnectionInterface
{
    /**
     * Set basic authentication details
     *
     * @param string $username
     * @param string $password
     */
    public function setBasicAuth($username, $password);

    /**
     * Sends the request to the remote service
     *
     * @param string $method get, post, put, delete, etc.
     * @param string $uri The URI relative to the base URL
     * @param array $data
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function send($method, $uri = '', array $data = array());
}
