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
     * Add constructor.
     * @param Context $context
     * @param RequestInterface $request
     * @param PageFactory $pageFactory
     * @param Registry $coreRegistry
     */
    public function __construct(Context $context,
                                RequestInterface $request,
                                PageFactory $pageFactory,
                                Registry $coreRegistry)
    {
        parent::__construct($context, $request, $pageFactory, $coreRegistry);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page|void
     */
    public function execute()
    {
        return $this->_pageFactory->create();
        exit();
    }
}