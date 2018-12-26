<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 13/11/2018
 * Time: 15:40
 */

namespace QHO\Hello\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Test extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * Test constructor.
     * @param Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        return $this->_pageFactory->create();
    }
}