<?php
namespace blesta\ResellerApi\Tests\Command;

use blesta\ResellerApi\Command\CommandFactory;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \blesta\ResellerApi\Command\CommandFactory
 */
class CommandFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::create
     * @uses \blesta\ResellerApi\Command\AbstractCommand::__construct
     */
    public function testCreate()
    {
        $factory = new CommandFactory();

        $connection = $this->getMock('\blesta\ResellerApi\ConnectionInterface');

        $this->assertInstanceOf(
            '\blesta\ResellerApi\Command\Credits',
            $factory->create('Credits', $connection)
        );
    }
}
