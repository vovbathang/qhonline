<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 11/6/18
 * Time: 1:07 AM
 */
namespace QHO\Schema\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Db\Ddl\Table;
use function PHPSTORM_META\type;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $setup->startSetup();
        $connect= $setup->getConnection();
        $tableName= $setup->getTable('data_example');
        if($connect->isTableExists($tableName) != true){
            $table= $connect->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity'=> true, 'unsigned'=> true, 'nullable'=> false, 'primary'=> true]
                )
                ->addColumn(
                    'title',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable'=> true, 'default'=> '']
                )
                ->addColumn(
                    'content',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullable'=> true, 'default'=> '']
                )
                ->setOption('charset', 'utf8');
            $connect->createTable($table);
        }
        $setup->endSetup();
    }
}
