<?php
namespace Blesta\ResellerApi\Command;

use Blesta\ResellerApi\ConnectionInterface;

/**
 * Command Interface
 */
interface CommandInterface
{
    /**
     * @param \Blesta\ResellerApi\ConnectionInterface $connection The connection
     */
    public function __construct(ConnectionInterface $connection);
}
