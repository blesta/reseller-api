<?php
namespace Blesta\ResellerApi\Command;

use Blesta\ResellerApi\ConnectionInterface;

/**
 * Command Factory
 */
class CommandFactory
{
    /**
     * Creates an instance of the command
     *
     * @param string $command The command to initialize
     * @param \Blesta\ResellerApi\ConnectionInterface $connection The connection
     * @return \Blesta\ResellerApi\Command\CommandInterface
     */
    public function create($command, ConnectionInterface $connection)
    {
        $fqcn = __NAMESPACE__ . '\\' . $command;
        return new $fqcn($connection);
    }
}
