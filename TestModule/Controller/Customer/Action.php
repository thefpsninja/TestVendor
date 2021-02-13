<?php

namespace Company\Module\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Booking extends \Magento\Framework\App\Action\Action
{
    /**
     * Booking action
     *
     * @return void
     */
    public function execute()
    {
        // 1. POST request : Get booking data
        $post = (array)$this->getRequest()->getPost();

        if (!empty($post)) {
            // Retrieve your form data
            $name = $post['name'];
            $returnproduct = $post['returnproduct'];
            $status = 1;
            $returnstatus = 1;
            $requeststatus = 0;

            // Doing-something with...

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
