<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 19/11/2018
 * Time: 15:27
 */

namespace QHO\Staff\Model;
class Staff extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init("QHO\Staff\Model\ResourceModel\Staff");
        parent::_construct(); // TODO: Change the autogenerated stub
    }
}