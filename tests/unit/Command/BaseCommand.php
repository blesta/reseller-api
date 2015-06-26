<?php
namespace blesta\ResellerApi\Tests\Command;

use blesta\ResellerApi\ConnectionInterface;
use blesta\ResellerApi\ResponseInterface;
use PHPUnit_Framework_TestCase;

/**
 * Base Command
 */
abstract class BaseCommand extends PHPUnit_Framework_TestCase
{
    /**
     * @return \blesta\ResellerApi\Response
     */
    public function getResponseMock()
    {
        return $this->getMockBuilder('\blesta\ResellerApi\Response')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return \blesta\ResellerApi\ConnectionInterface
     */
    public function getConnectionMock()
    {
        return $this->getMock('\blesta\ResellerApi\ConnectionInterface');
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
