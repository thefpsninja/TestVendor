<?php


namespace TestVendor\TestModule\Api;

use TestVendor\TestModule\Api\Data\ReturnRequestInterface;

/**
 * Interface SampleInterface
 *
 * @package Academy\Database\Api\Data
 */
interface ReturnRequestRepositoryInterface
{

    /**
     * @param \TestVendor\TestModule\Api\Data\ReturnRequestInterface $returnrequestList
     *
     * @return mixed
     */
    public function save(ReturnRequestInterface $returnrequestList);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id);
}
