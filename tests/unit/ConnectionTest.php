<?php
namespace Blesta\ResellerApi\Tests {

    use Blesta\ResellerApi\Connection;
    use PHPUnit_Framework_TestCase;

    /**
     * @coversDefaultClass \Blesta\ResellerApi\Connection
     */
    class ConnectionTest extends PHPUnit_Framework_TestCase
    {
        /**
         * @covers ::__construct
         */
        public function testConstruct()
        {
            $this->assertInstanceOf(
                '\Blesta\ResellerApi\ConnectionInterface',
                new Connection()
            );
        }

        /**
         * @covers ::send
         * @covers ::setBasicAuth
         * @covers ::__construct
         */
        public function testSend()
        {
            $mockResponse = $this->getMockForAbstractClass('\Blesta\ResellerApi\ResponseInterface');
            $mockResponse->expects($this->once())
                ->method('withBody')
                ->with('{}')
                ->will($this->returnSelf());
            $mockResponse->expects($this->once())
                ->method('withStatus')
                ->with(200)
                ->will($this->returnSelf());

            $connection = new Connection($mockResponse);
            $connection->setBasicAuth('username', 'password');
            $connection->send('get', 'index/getcredits.json', array('key' => 'value'));
        }
    }
}

namespace Blesta\ResellerApi {

    function curl_exec($ch)
    {
        return '{}';
    }

    function curl_getinfo($ch, $opt)
    {
        if (CURLINFO_HTTP_CODE === $opt) {
            return 200;
        }
        return null;
    }
}
