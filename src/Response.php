<?php
namespace Blesta\ResellerApi;

/**
 * Response
 */
class Response implements ResponseInterface
{
    private $body = null;
    private $statusCode = 200;
    private $reasonPhrase = '';

    /**
     * {@inheritdoc}
     */
    public function withBody($body)
    {
        $new = clone $this;
        $new->body = $body;
        return $new;
    }

    /**
     * {@inheritdoc}
     */
    public function withStatus($statusCode, $reasonPhrase = '')
    {
        $new = clone $this;
        $new->statusCode = (int) $statusCode;
        $new->reasonPhrase = $reasonPhrase;
        return $new;
    }

    /**
     * Decoded response body
     *
     * @param boolean $assoc Convert result to associative array
     * @return object|array|string|int
     */
    private function decodeResponse($assoc = false)
    {
        return json_decode($this->body, $assoc);
    }

    /**
     * {@inheritdoc}
     */
    public function errors()
    {
        $response = $this->decodeResponse(true);
        if (isset($response['errors'])) {
            return $response['errors'];
        }
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function response()
    {
        $response = $this->decodeResponse();
        if (isset($response->response)) {
            return $response->response;
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function message()
    {
        $response = $this->decodeResponse();
        if (isset($response->message)) {
            return $response->message;
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
}
