<?php

namespace TestVendor\TestModule\Controller\Customer;

use Magento\Framework\Controller\ResultFactory;


class Action extends \Magento\Framework\App\Action\Action
{
    private \TestVendor\TestModule\Model\ReturnRequest $customTable;

    protected function __construct(\TestVendor\TestModule\Model\ReturnRequest $customTable)
{
   $this->customTable = $customTable;
}

    /**
     * Return Request action
     *
     * @return void
     */
    public function execute()
    {
        // 1. POST request : Get booking data
        $post = (array)$this->getRequest()->getPost();
        ob_start();
        var_dump($post);
        file_put_contents("var/log/namn.log", ob_get_clean());
        if (!empty($post)) {
            // Retrieve your form data
            $name = $post['name'];
            $returnproduct = $post['returnproduct'];
            $status = 1;
            $returnstatus = 1;
            $requeststatus = 0;

            // Doing-something with...
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $model=$objectManager->get('TestVendor\TestModule\Model\ReturnRequest')->getConnection('TestVendor\TestModule\Model\ReturnRequest::DEFAULT_CONNECTION');
            $model->setName($name);
            $model->setReturnProduct($returnproduct);
            $model->setStatus($status);
            $model->setReturnStatus($returnstatus);
            $model->setRequestStatus($requeststatus);
            $model->save();

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
?>
