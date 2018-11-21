<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 29/10/2018
 * Time: 16:16
 */

namespace QHO\Hello\Controller\Index;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var RequestInterface
     */
    protected $_request;
    /**
     * @var PageFactory
     */
    protected $_pageFactory;
    /**
     * @var
     */
    protected $_coreRegistry;

    /**
     * Index constructor.
     * @param Context $context
     * @param RequestInterface $request
     */
    public function __construct(Context $context,
                                RequestInterface $request,
                                PageFactory $pageFactory,
                                Registry $coreRegistry)
    {
        $this->_request = $request;
        $this->_coreRegistry = $coreRegistry;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context, $request);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_coreRegistry->register("qho", "Welcome to QHO");
        return $this->_pageFactory->create();
    }

    /**
     * Define getInfo function
     */
    public function getInfo()
    {
        $requestName = $this->_request->getFullActionName();
        $result = explode("_", $requestName);
        return $result;
    }
}