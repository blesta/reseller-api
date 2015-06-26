<?php
namespace blesta\ResellerApi\Command;

/**
 * Credits
 */
class Credits extends AbstractCommand
{
    /**
     * Fetch the amount of credit available under your account
     *
     * @return \blesta\ResellerApi\ResponseInterface
     */
    public function get()
    {
        return $this->connection->send('get', 'index/getcredit.json');
    }
}
