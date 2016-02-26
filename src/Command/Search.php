<?php
namespace Blesta\ResellerApi\Command;

/**
 * Search
 */
class Search extends AbstractCommand
{
    /**
     * @var int The results page
     */
    private $page = 1;

    /**
     * @var type string The search string
     */
    private $search = null;

    /**
     * Set the data to search
     *
     * @param string $search
     * @return Search
     */
    public function data($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * Set the result page
     *
     * @param int $page
     * @return Search
     */
    public function page($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Fetch all licenses that match the search criteria, which includes
     * license key, domain, IP, and install path. Only non-canceled licenses
     * are returned. Up to 25 results are returned for each response.
     *
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function get()
    {
        return $this->connection->send(
            'get',
            'index/search.json',
            array(
                'vars' => array(
                    'search' => $this->search,
                    'page' => $this->page
                )
            )
        );
    }
}
