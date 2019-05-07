<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 12/11/2018
 * Time: 15:34
 */

namespace QHO\Hello\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Save extends Index
{
    /**
<<<<<<< HEAD
=======
     * Save constructor.
     * @param Context $context
     * @param RequestInterface $request
     * @param PageFactory $pageFactory
     * @param Registry $coreRegistry
     */
    public function __construct(Context $context, RequestInterface $request, PageFactory $pageFactory, Registry $coreRegistry)
    {
        parent::__construct($context, $request, $pageFactory, $coreRegistry);
    }

    /**
>>>>>>> e86c4ca4f47958e8cf994e64f2d4761b62aae0b5
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_forward('add');
    }
}