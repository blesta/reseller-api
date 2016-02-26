<?php
namespace Blesta\ResellerApi\Tests\Command;

use Blesta\ResellerApi\Command\Licenses;

/**
 * @coversDefaultClass \Blesta\ResellerApi\Command\Licenses
 */
class LicensesTest extends BaseCommand
{
    /**
     * @covers ::add
     * @covers ::__construct
     */
    public function testAdd()
    {
        $data = array('pricing_id' => 1, 'test_mode' => 'true');
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'post',
            'index/addlicense.json',
            array('vars' => $data)
        );

        $licenses = new Licenses($connectionMock);
        $response = $licenses->add($data);
        $this->assertEquals($responseMock, $response);
    }

    /**
     * @covers ::update
     * @covers ::__construct
     */
    public function testUpdate()
    {
        $data = array('license' => 'abcdef0123456789', 'test_mode' => 'true');
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'post',
            'index/update.json',
            array('vars' => $data)
        );

        $licenses = new Licenses($connectionMock);
        $response = $licenses->update($data);
        $this->assertEquals($responseMock, $response);
    }

    /**
     * @covers ::cancel
     * @covers ::__construct
     */
    public function testCancel()
    {
        $data = array('license' => 'abcdef0123456789', 'test_mode' => 'true');
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'post',
            'index/cancellicense.json',
            array('vars' => $data)
        );

        $licenses = new Licenses($connectionMock);
        $response = $licenses->cancel($data);
        $this->assertEquals($responseMock, $response);
    }

    /**
     * @covers ::suspend
     * @covers ::__construct
     */
    public function testSuspend()
    {
        $data = array('license' => 'abcdef0123456789', 'test_mode' => 'true');
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'post',
            'index/suspendlicense.json',
            array('vars' => $data)
        );

        $licenses = new Licenses($connectionMock);
        $response = $licenses->suspend($data);
        $this->assertEquals($responseMock, $response);
    }

    /**
     * @covers ::unsuspend
     * @covers ::__construct
     */
    public function testUnsuspend()
    {
        $data = array('license' => 'abcdef0123456789', 'test_mode' => 'true');
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'post',
            'index/unsuspendlicense.json',
            array('vars' => $data)
        );

        $licenses = new Licenses($connectionMock);
        $response = $licenses->unsuspend($data);
        $this->assertEquals($responseMock, $response);
    }
}
