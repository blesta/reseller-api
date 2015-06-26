<?php
namespace blesta\ResellerApi\Command;

use blesta\ResellerApi\ConnectionInterface;

/**
 * Abstract Command
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * @var \blesta\ResellerApi\ConnectionInterface
     */
    protected $connection;

    /**
     * {@inheritdoc}
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }
}
