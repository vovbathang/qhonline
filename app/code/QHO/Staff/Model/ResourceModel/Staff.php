<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 19/11/2018
 * Time: 15:28
 */

namespace QHO\Staff\Model\ResourceModel;
class Staff extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init("staff", "id");
        // TODO: Implement _construct() method.
    }
}