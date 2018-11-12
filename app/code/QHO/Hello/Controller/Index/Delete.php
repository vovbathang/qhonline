<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 12/11/2018
 * Time: 15:23
 */

namespace QHO\Hello\Controller\Index;

class Delete extends Index
{
    public function execute()
    {
        $this->_redirect('hello/index/add');
    }
}