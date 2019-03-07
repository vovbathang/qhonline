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
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_redirect('hello/index/add');
    }
}