<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 23/11/2018
 * Time: 17:58
 */
namespace QHO\Staff\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable("staff");
        if ($conn->isTableExists($tableName) != true) {
            $table = $conn->newTable($tableName);
            $columns = [
                "id" => [
                    "type" => Table::TYPE_INTEGER,
                    "size" => null,
                    "options" => [
                        "identity" => true,
                        "unsigned" => true,
                        "nullable" => false,
                        "primary" => true
                    ]
                ],
                "name" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "email" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "phone" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "position" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "status" => [
                    "type" => Table::TYPE_BOOLEAN,
                    "size" => null,
                    "options" => [
                        "nullable" => false,
                        "default" => "0"
                    ]
                ],
                "avatar" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
            ];
            foreach ($columns as $name => $value) {
                $table->addColumn(
                    $name,
                    $value["type"],
                    $value["size"],
                    $value["options"]
                );
            }
            $table->setOption("charset", "utf8");
            $conn->createTable($table);
        }else{
            //$fullTextIndex=array("name", "email", "phone");
           // $conn->addIndex($tableName, $setup->getIdxName($tableName, $fullTextIndex, AdapterInterface::INDEX_TYPE_FULLTEXT), $fullTextIndex, AdapterInterface::INDEX_TYPE_FULLTEXT);
            $setup->run("ALTER TABLE ".$tableName." ADD COLUMN profile MEDIUMTEXT");
        }
        $setup->endSetup();
        // TODO: Implement install() method.
    }
}