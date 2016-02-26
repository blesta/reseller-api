<?php
namespace Blesta\ResellerApi\Command;

/**
 * Licenses
 */
class Licenses extends AbstractCommand
{
    /**
     * Add a new license
     *
     * @param array $data An array of key/value pairs:
     *  - pricing_id The pricing ID
     *  - test_mode "true" to enable test mode
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function add(array $data)
    {
        return $this->connection->send(
            'post',
            'index/addlicense.json',
            array('vars' => $data)
        );
    }

    /**
     * Update a license
     *
     * @param array $data An array of key/value pairs:
     *  - license The license key
     *  - reissue_status "reissue" to enable reissue
     *  - test_mode "true" to enable test mode
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function update(array $data)
    {
        return $this->connection->send(
            'post',
            'index/update.json',
            array('vars' => $data)
        );
    }

    /**
     * Cancel a license
     *
     * @param array $data An array of key/value pairs:
     *  - license The license key
     *  - test_mode "true" to enable test mode
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function cancel(array $data)
    {
        return $this->connection->send(
            'post',
            'index/cancellicense.json',
            array('vars' => $data)
        );
    }

    /**
     * Suspend a license
     *
     * @param array $data An array of key/value pairs:
     *  - license The license key
     *  - test_mode "true" to enable test mode
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function suspend(array $data)
    {
        return $this->connection->send(
            'post',
            'index/suspendlicense.json',
            array('vars' => $data)
        );
    }

    /**
     * Unsuspend a license
     *
     * @param array $data An array of key/value pairs:
     *  - license The license key
     *  - test_mode "true" to enable test mode
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function unsuspend(array $data)
    {
        return $this->connection->send(
            'post',
            'index/unsuspendlicense.json',
            array('vars' => $data)
        );
    }
}
