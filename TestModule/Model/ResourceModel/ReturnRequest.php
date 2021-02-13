<?php
namespace TestVendor\TestModule\Model\ResourceModel;


class ReturnRequest extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('testvendor_testmodule_returnrequest', 'returnrequest_id');
	}
	
}