<?php
namespace Blesta\ResellerApi\Tests\Command;

use Blesta\ResellerApi\Command\Packages;

/**
 * @coversDefaultClass \Blesta\ResellerApi\Command\Packages
 */
class PackagesTest extends BaseCommand
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
            'index/getpackages.json'
        );

        $packages = new Packages($connectionMock);
        $response = $packages->get();
        $this->assertEquals($responseMock, $response);
    }

    /**
     * @covers ::getPricing
     * @covers ::__construct
     */
    public function testGetPricing()
    {
        $package_id = 1;
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'get',
            'index/getpackagepricing.json',
            array('package_id' => $package_id)
        );

        $packages = new Packages($connectionMock);
        $response = $packages->getPricing($package_id);
        $this->assertEquals($responseMock, $response);
    }
}
