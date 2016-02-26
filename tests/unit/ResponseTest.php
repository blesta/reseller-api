<?php
namespace Blesta\ResellerApi\Tests;

use Blesta\ResellerApi\Response;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Blesta\ResellerApi\Response
 */
class ResponseTest extends PHPUnit_Framework_TestCase
{
    private $response;

    public function setUp()
    {
        $this->response = new Response();
    }
    /**
     * @covers ::withBody
     * @covers ::getBody
     */
    public function testBody()
    {
        $body = "{}";

        $response = $this->response
            ->withBody($body);

        $this->assertEquals($body, $response->getBody());
    }

    /**
     * @covers ::withStatus
     * @covers ::getStatusCode
     * @covers ::getReasonPhrase
     */
    public function testStatus()
    {
        $status = 400;
        $reason = 'Test Error';

        $response = $this->response
            ->withStatus($status, $reason);

        $this->assertEquals($status, $response->getStatusCode());
        $this->assertEquals($reason, $response->getReasonPhrase());
    }

    private function loadFixture($fixture)
    {
        $fixtureDir = __DIR__ . DIRECTORY_SEPARATOR
            . 'Fixture' . DIRECTORY_SEPARATOR;

        return file_get_contents($fixtureDir . $fixture);
    }

    /**
     * @covers ::errors
     * @covers ::withBody
     * @covers ::decodeResponse
     */
    public function testErrors()
    {
        $fixture = $this->loadFixture('error.json');
        $data = json_decode($fixture, true);

        $this->assertEquals(
            $data['errors'],
            $this->response
                ->withBody($fixture)
                ->errors()
        );

        $this->assertEquals(
            array(),
            $this->response
                ->withBody('{}')
                ->errors()
        );
    }

    /**
     * @covers ::response
     * @covers ::withBody
     * @covers ::decodeResponse
     */
    public function testResponse()
    {
        $fixture = $this->loadFixture('response.json');
        $data = json_decode($fixture);

        $this->assertEquals(
            $data->response,
            $this->response
                ->withBody($fixture)
                ->response()
        );

        $this->assertNull(
            $this->response
                ->withBody('{}')
                ->response()
        );
    }

    /**
     * @covers ::message
     * @covers ::withBody
     * @covers ::decodeResponse
     */
    public function testMessage()
    {
        $fixture = $this->loadFixture('message.json');
        $data = json_decode($fixture);

        $this->assertEquals(
            $data->message,
            $this->response
                ->withBody($fixture)
                ->message()
        );

        $this->assertNull(
            $this->response
                ->withBody('{}')
                ->message()
        );
    }
}
