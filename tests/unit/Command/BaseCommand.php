<?php
namespace Blesta\ResellerApi\Tests\Command;

use Blesta\ResellerApi\ConnectionInterface;
use Blesta\ResellerApi\ResponseInterface;
use PHPUnit_Framework_TestCase;

/**
 * Base Command
 */
abstract class BaseCommand extends PHPUnit_Framework_TestCase
{
    /**
     * @return \Blesta\ResellerApi\Response
     */
    public function getResponseMock()
    {
        return $this->getMockBuilder('\Blesta\ResellerApi\Response')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return \Blesta\ResellerApi\ConnectionInterface
     */
    public function getConnectionMock()
    {
        return $this->getMock('\Blesta\ResellerApi\ConnectionInterface');
    }

    /**
     * Set expectations for ConnectionInterface::send
     *
     * @param ConnectionInterface $connection
     * @param ResponseInterface $response
     * @param string $method
     * @param string $uri
     * @param array $data
     */
    public function setExpectation(
        ConnectionInterface $connection,
        ResponseInterface $response,
        $method,
        $uri,
        array $data = array()
    ) {
        $connection->expects($this->once())
            ->method('send')
            ->with($this->equalTo($method), $this->equalTo($uri), $this->equalTo($data))
            ->will($this->returnValue($response));
    }
}
