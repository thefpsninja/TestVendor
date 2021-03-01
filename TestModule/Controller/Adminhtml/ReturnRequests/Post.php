<?php

namespace TestVendor\TestModule\Controller\Adminhtml\ReturnRequests;

use Magento\Framework\Controller\ResultFactory;

class Post extends \Magento\Framework\App\Action\Action
{
    protected \TestVendor\TestModule\Model\ReturnRequestFactory $_returnrequestFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \TestVendor\TestModule\Model\ReturnRequestFactory $returnrequestFactory
    )
    {
        $this->_returnrequestFactory = $returnrequestFactory;
        return parent::__construct($context);
    }
    /**
     * Return Request action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $model=$objectManager->create('TestVendor\TestModule\Model\ReturnRequest');
        $datacollections=$model->getCollection();
        // 1. POST request : Get booking data
        $post = (array)$this->getRequest()->getPost();
        if (!empty($post)) {
            $requeststatus = 1;
            $formid = $post['id'];
            $formname = $post['name'];

            // Doing-something with...
            $datacollection=$this->_returnrequestFactory->create()
            ->$datacollections->load($formname, $formid)
            ->setRequestStatus($requeststatus);
            $datacollection->save();

            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Return Request Added');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/testmodule/customer/index');

            return $resultRedirect;
        }
        // 2. GET request : Render the booking page
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
