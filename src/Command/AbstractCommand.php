<?php
namespace Blesta\ResellerApi\Command;

use Blesta\ResellerApi\ConnectionInterface;

/**
 * Abstract Command
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * @var \Blesta\ResellerApi\ConnectionInterface
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
