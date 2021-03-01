<?php
namespace TestVendor\TestModule\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}
    public function getFormAction()
    {
        // companymodule is given in routes.xml
        // controller_name is folder name inside controller folder
        // action is php file name inside above controller_name folder
        return $this->getUrl('testmodule/customer/post', ['_secure' => true]);
        // here controller_name is index, action is booking
    }
    public function getAdminFormAction()
    {
        // companymodule is given in routes.xml
        // controller_name is folder name inside controller folder
        // action is php file name inside above controller_name folder
        return $this->getUrl('testmodule/adminhtml/returnrequests/post', ['_secure' => true]);
        // here controller_name is index, action is booking
    }

}
