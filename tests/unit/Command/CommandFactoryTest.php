<?php
namespace Blesta\ResellerApi\Tests\Command;

use Blesta\ResellerApi\Command\CommandFactory;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Blesta\ResellerApi\Command\CommandFactory
 */
class CommandFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::create
     * @uses \Blesta\ResellerApi\Command\AbstractCommand::__construct
     */
    public function testCreate()
    {
        $factory = new CommandFactory();

        $connection = $this->getMock('\Blesta\ResellerApi\ConnectionInterface');

        $this->assertInstanceOf(
            '\Blesta\ResellerApi\Command\Credits',
            $factory->create('Credits', $connection)
        );
    }
}
