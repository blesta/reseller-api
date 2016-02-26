<?php
namespace Blesta\ResellerApi\Command;

/**
 * Packages
 */
class Packages extends AbstractCommand
{
    /**
     * Fetch all available reseller packages
     *
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function get()
    {
        return $this->connection->send('get', 'index/getpackages.json');
    }

    /**
     * Fetch pricing for a specific package
     *
     * @param int $package_id The ID of the package
     * @return \Blesta\ResellerApi\ResponseInterface
     */
    public function getPricing($package_id)
    {
        return $this->connection->send(
            'get',
            'index/getpackagepricing.json',
            array('package_id' => $package_id)
        );
    }
}
