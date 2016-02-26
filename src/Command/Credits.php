<?php
namespace Blesta\ResellerApi\Command;

/**
 * Credits
 */
class Credits extends AbstractCommand
{
    /**
     * Fetch the amount of credit available under your account
     *
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function get()
    {
        return $this->connection->send('get', 'index/getcredit.json');
    }
}
