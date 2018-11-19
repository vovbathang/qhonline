<?php

namespace QHO\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu("QHO_Staff::staff");
        $resultPage->getConfig()->getTitle()->prepend(__("Staff Manager"));
        /*$staffModel= $this->_objectManager->create("QHO\Staff\Model\Staff");
        $staffModel->addData([
            "name"=>"Nguyen Ba Quang",
            "email"=> "quangg@gmail.com",
            "phone"=>"0912377700",
            "position"=>"Member",
            "avatar"=>"staff/quang.jpg",
            "status"=>true
        ])->save();*/
        return $resultPage;
    }
}