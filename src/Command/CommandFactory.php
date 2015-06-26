<?php
namespace blesta\ResellerApi\Command;

use blesta\ResellerApi\ConnectionInterface;

/**
 * Command Factory
 */
class CommandFactory
{
    /**
     * Creates an instance of the command
     *
     * @param string $command The command to initialize
     * @param \blesta\ResellerApi\ConnectionInterface $connection The connection
     * @return \blesta\ResellerApi\Command\CommandInterface
     */
    public function create($command, ConnectionInterface $connection)
    {
        $fqcn = __NAMESPACE__ . '\\' . $command;
        return new $fqcn($connection);
    }
}
