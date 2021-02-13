<?php
namespace TestVendor\TestModule\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();

		if (!$installer->tableExists('testvendor_testmodule_returnrequest')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('testvendor_testmodule_returnrequest')
			)
				->addColumn(
					'returnrequest_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'ReturnRequest ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'ReturnRequest Name'
				)
				->addColumn(
					'return_product',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Return Product Nr'
				)
                ->addColumn(
					'status',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'ReturnRequest Status'
				)
				->addColumn(
					'return_status',
					\Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
					255,
					[],
					'Return Status'
				)
				->addColumn(
					'request_status',
					\Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
					255,
					[],
					'Request Status'
				)
				->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('Return Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('testvendor_testmodule_returnrequest'),
				$setup->getIdxName(
					$installer->getTable('testvendor_testmodule_returnrequest'),
					['name','return_product','request_status'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name','return_product','request_status'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
