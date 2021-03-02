<?php

namespace TestVendor\TestModule\Model;


use TestVendor\TestModule\Api\Data\ReturnRequestInterface;
use TestVendor\TestModule\Api\ReturnRequestRepositoryInterface;
use TestVendor\TestModule\Model\ResourceModel\ReturnRequest as ReturnRequestResource;
use Magento\Framework\Exception\AlreadyExistsException;

class ReturnRequestRepository implements ReturnRequestRepositoryInterface
{

    /**
     * @var ReturnRequestFactory
     */
    private $returnrequestList;
    /**
     * @var ReturnRequest
     */
    private $returnrequestListResource;

    public function __construct(
        ReturnRequestFactory $returnrequestList,
        ReturnRequestResource $returnrequestListResource
    ) {
        $this->returnrequestList         = $returnrequestList;
        $this->returnrequestListResource = $returnrequestListResource;
    }

    /**
     * @param ReturnRequestInterface $returnrequest
     *
     * @return void
     *
     * @throws AlreadyExistsException
     * @throws \Exception
     */
    public function save(ReturnRequestInterface $returnrequest)
    {
        try {
            $this->returnrequestListResource->save($returnrequest);
        } catch (AlreadyExistsException $e) {
            //catch exception
        } catch (\Exception $e) {
            //catch exception
        }
    }

    /**
     * @param int $returnrequestId
     *
     * @return \TestVendor\TestModule\Model\ReturnRequest
     */
    public function getById(int $returnrequestId)
    {
        $returnrequestListModel = $this->returnrequestList->create();
        $this->returnrequestListResource->load($returnrequestListModel, $returnrequestId);

        return $returnrequestListModel;
    }
}
