<?php
namespace TestVendor\TestModule\Model;
class ReturnRequest extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'testvendor_testmodule_returnrequest';

	protected $_cacheTag = 'testvendor_testmodule_returnrequest';

	protected $_eventPrefix = 'testvendor_testmodule_returnrequest';

	protected function _construct()
	{
		$this->_init('TestVendor\TestModule\Model\ResourceModel\ReturnRequest');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}