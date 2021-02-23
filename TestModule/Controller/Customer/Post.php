<?php

namespace TestVendor\TestModule\Controller\Customer;

use Magento\Framework\Controller\ResultFactory;

class Post implements HttpPostActionInterface
{
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
            $return = $this->returnsFactory->create();
            $return->setName($name);
            $return->setReturnProduct($returnproduct);
            $return->setStatus($status);
            $return->setReturnStatus($returnstatus);
            $return->setRequestStatus($requeststatus);
            $this->returnsRepository->save($return);

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
