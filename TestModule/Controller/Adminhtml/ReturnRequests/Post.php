<?php

namespace TestVendor\TestModule\Controller\Adminhtml\ReturnRequests;

use Magento\Framework\Controller\ResultFactory;

class Post extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \TestVendor\TestModule\Api\Data\ReturnRequestInterfaceFactory $returnRequestListFactory,
        \TestVendor\TestModule\Api\ReturnRequestRepositoryInterface $returnRequestListRepository
    ) {
        $this->returnRequestListFactory    = $returnRequestListFactory;
        $this->returnRequestListRepository = $returnRequestListRepository;
    }
    public function execute()
    {
        $customerId = $post['id'];//use needed customer ID

        /**
         * Create entity
         *
         * @var ReturnRequest $returnRequestList
         */
        $returnRequestList = $this->returnRequestListFactory->create();
        $returnRequestList->setData(['name' => 'returnRequest name']);
        $this->returnRequestListRepository->save($returnRequestList);

        /**
         * Read entity
         *
         * @var ReturnRequest $returnRequestList
         */
        $returnRequestList = $this->returnRequestListRepository->getById($returnRequestId);
        $returnRequestData = $returnRequestList->getData();//data of entity

        /**
         * Update entity
         *
         * @var ReturnRequest $returnRequestList
         */
        $returnRequestList = $this->returnRequestListRepository->getById($customerId);
        $returnRequestList->addData(['name' => 'bdn']);
        $this->returnRequestListRepository->save($returnRequestList);
    }
}
