<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 29/10/2018
 * Time: 16:59
 */
namespace QHO\Hello\Controller\Index;

class Add extends Index{
    public function execute()
    {
        return $this->_pageFactory->create();
        exit();
    }
}