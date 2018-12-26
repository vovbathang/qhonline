<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 12/11/2018
 * Time: 15:23
 */

namespace QHO\Hello\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Edit extends Index
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('hello/index/index');
        return $resultRedirect;
    }
}