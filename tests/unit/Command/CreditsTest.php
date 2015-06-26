<?php
namespace blesta\ResellerApi\Tests\Command;

use blesta\ResellerApi\Command\Credits;

/**
 * @coversDefaultClass \blesta\ResellerApi\Command\Credits
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
