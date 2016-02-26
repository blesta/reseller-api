<?php
namespace Blesta\ResellerApi\Tests\Command;

use Blesta\ResellerApi\Command\Credits;

/**
 * @coversDefaultClass \Blesta\ResellerApi\Command\Credits
 */
class CreditsTest extends BaseCommand
{
    /**
     * @covers ::get
     * @covers ::__construct
     */
    public function testGet()
    {
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'get',
            'index/getcredit.json'
        );

        $credits = new Credits($connectionMock);
        $response = $credits->get();
        $this->assertEquals($responseMock, $response);
    }
}
