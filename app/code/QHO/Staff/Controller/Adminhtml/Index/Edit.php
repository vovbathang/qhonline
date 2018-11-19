<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 19/11/2018
 * Time: 19:15
 */

namespace QHO\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use QHO\Staff\Model\StaffFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    protected $_staffFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context,
                                PageFactory $pageFactory,
                                StaffFactory $staffFactory)
    {
        $this->_resultPageFactory = $pageFactory;
        $this->_staffFactory = $staffFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $staffId = $this->getRequest()->getParam("id");
        $model = $this->_staffFactory->create();
        if ($staffId) {
            $model->load($staffId);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__("This staff no longer exists."));
                return $this->_redirect("*/*/");
            }
            $title = "Edit a Staff: " . $model->getName();
        } else {
            $title = "Add a New Staff";
        }
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu("QHO_Staff::staff");
        $resultPage->getConfig()->getTitle()->prepend(__($title));
        return $resultPage;
    }
}