<?php
namespace Blesta\ResellerApi;

/**
 * Response Interface
 */
interface ResponseInterface
{
    /**
     * Set the response body
     *
     * @param string $body
     * @return ResponseInterface
     */
    public function withBody($body);

    /**
     * Set the status
     *
     * @param int $statusCode
     * @param string $reasonPharse
     * @return ResponseInterface
     */
    public function withStatus($statusCode, $reasonPharse = '');

    /**
     * Return all errors encountered
     *
     * @return array
     */
    public function errors();

    /**
     * Return the response
     *
     * @return string|array
     */
    public function response();

    /**
     * Return the message
     *
     * @return string
     */
    public function message();

    /**
     * The body
     *
     * @return string
     */
    public function getBody();

    /**
     * The status code
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * The reason phrase
     *
     * @return string
     */
    public function getReasonPhrase();
}
