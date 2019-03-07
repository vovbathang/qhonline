<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/11/2018
 * Time: 14:34
 */

namespace QHO\Staff\Controller\Index;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    public $_pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $this->_view->getPage()->getConfig()->getTitle()->set(__("Our Team"));
        $resultPage = $this->_pageFactory->create();
        return $resultPage;
    }
}