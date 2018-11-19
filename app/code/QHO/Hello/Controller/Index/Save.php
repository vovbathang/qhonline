<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 12/11/2018
 * Time: 15:34
 */

namespace QHO\Hello\Controller\Index ;

class Save extends Index
{
    public function execute()
    {
        $this->_forward('add');
    }
}