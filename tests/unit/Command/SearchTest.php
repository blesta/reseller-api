<?php
namespace blesta\ResellerApi\Tests\Command;

use blesta\ResellerApi\Command\Search;

/**
 * @coversDefaultClass \blesta\ResellerApi\Command\Search
 */
class SearchTest extends BaseCommand
{
    /**
     * @covers ::get
     * @covers ::page
     * @covers ::data
     * @covers ::__construct
     */
    public function testGet()
    {
        $data = 'abcdef0123456789';
        $page = 1;
        $responseMock = $this->getResponseMock();
        $connectionMock = $this->getConnectionMock();
        $this->setExpectation(
            $connectionMock,
            $responseMock,
            'get',
            'index/search.json',
            array('vars' => array('search' => $data, 'page' => $page))
        );

        $search = new Search($connectionMock);
        $response = $search->page($page)
            ->data($data)
            ->get();
        $this->assertEquals($responseMock, $response);
    }
}
