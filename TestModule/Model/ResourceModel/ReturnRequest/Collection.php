<?php
namespace TestVendor\TestModule\Model\ResourceModel\ReturnRequest;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'returnrequest_id';
	protected $_eventPrefix = 'testvendor_testmodule_returnrequest_collection';
	protected $_eventObject = 'returnrequest_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('TestVendor\TestModule\Model\ReturnRequest', 'TestVendor\TestModule\Model\ResourceModel\ReturnRequest');
	}

}