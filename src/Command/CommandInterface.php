<?php
namespace blesta\ResellerApi\Command;

use blesta\ResellerApi\ConnectionInterface;

/**
 * Command Interface
 */
interface CommandInterface
{
    /**
     * @param \blesta\ResellerApi\ConnectionInterface $connection The connection
     */
    public function __construct(ConnectionInterface $connection);
}
