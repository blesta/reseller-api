<?php
namespace Blesta\ResellerApi;

/**
 * Connection
 */
class Connection implements ConnectionInterface
{
    /**
     * @var string HTTP Basic Auth Username
     */
    private $username;

    /**
     * @var string HTTP Basic Auth Password
     */
    private $password;

    /**
     * @var string Remote URL
     */
    private $url = 'https://account.blesta.com/plugin/blesta_reseller/v2/';

    /**
     * {@inheritdoc}
     */
    public function __construct(ResponseInterface $response = null)
    {
        if (null === $response) {
            $response = new Response();
        }
        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function setBasicAuth($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    public function send($method, $uri = '', array $data = array())
    {
        $url = $this->url . $uri;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if (!empty($this->username)) {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
        }

        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $result = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $response = $this->response
            ->withBody($result)
            ->withStatus($status);
        return $response;
    }
}
