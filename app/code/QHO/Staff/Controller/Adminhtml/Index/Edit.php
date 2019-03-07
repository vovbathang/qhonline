<?php

namespace QHO\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use QHO\Staff\Model\StaffFactory;
use Magento\Framework\Registry;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;
    /**
     * @var StaffFactory
     */
    protected $_staffFactory;
    /**
     * @var Registry
     */
    protected $_coreRegistry;
    /**
     * Const
     */
    const ADMIN_RESOURCE = "QHO_Staff::staff_save";

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param StaffFactory $staffFactory
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        StaffFactory $staffFactory,
        Registry $registry)
    {
        parent::__construct($context);
        $this->_resultPageFactory = $pageFactory;
        $this->_staffFactory = $staffFactory;
        $this->_coreRegistry = $registry;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $staffId = $this->getRequest()->getParam("id");
        $model = $this->_staffFactory->create();
        if ($staffId) {
            $model->load($staffId);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__("This staff no longer exists"));
                return $this->_redirect("*/*/");
            }
            $title = "Edit A Staff: " . $model->getName();
        } else {
            $title = "Add A New Staff";
        }
        $data = $this->_session->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register("staff", $model);
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu("QHO_Staff::staff");
        $resultPage->getConfig()->getTitle()->prepend(__($title));
        return $resultPage;
    }
}