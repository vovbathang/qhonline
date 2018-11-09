<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 15:41
 */
namespace QHO\Schema\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Db\Ddl\Table;

class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface {
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
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
        }else{
            $setup->run("ALTER TABLE ".$tableName." ADD COLUMN status BOOLEAN, ADD sort_order SMALLINT");
        }
        $setup->endSetup();
    }
}