<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 15:57
 */
namespace QHO\Schema\Model\ResourceModel;

class DataExample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
    public function _construct()
    {
        $this->_init("data_example", "id");
        // TODO: Implement _construct() method.
    }
}