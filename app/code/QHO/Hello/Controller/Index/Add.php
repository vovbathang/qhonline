<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 29/10/2018
 * Time: 16:59
 */

namespace QHO\Hello\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Add extends Index
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page|void
     */
    public function execute()
    {
        return $this->_pageFactory->create();
        exit();
    }
}