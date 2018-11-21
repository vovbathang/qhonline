<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 21/11/2018
 * Time: 18:53
 */

namespace QHO\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use QHO\Staff\Model\StaffFactory;

class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    public $_resultPageFactory;
    /**
     * @var StaffFactory
     */
    public $_staffFactory;
    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context,
                                PageFactory $pageFactory,
                                Registry $registry,
                                StaffFactory $staffFactory)
    {
        parent::__construct($context);
        $this->_resultPageFactory = $pageFactory;
        $this->_coreRegistry = $registry;
        $this->_staffFactory = $staffFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */

    public function execute()
    {
        $request = $this->getRequest();
        if ($request->getPost()) {
            $staffModel = $this->_staffFactory->create();
            $staffId = $request->getParam("id");
            $formData = $request->getPostValue();
            if ($staffId) {
                $staffModel->load($staffId);
            }
            $staffModel->setName($formData['name']);
            $staffModel->setEmail($formData['email']);
            $staffModel->setPhone($formData['phone']);
            $staffModel->setPosition($formData['position']);
            $staffModel->setStatus($formData['status']);
            $formFile = $request->getFiles()->toArray();
            if ($formFile['avatar']['name']) {
                $staffModel->setAvatar("staff/demo.jpg");
            } else {
                if (!$staffId) {
                    $this->messageManager->addErrorMessage(__("You must upload avatar."));
                    $this->_getSession()->setFormData($formData);
                    return $this->_redirect("*/*/add");
                }
            }
            $staffModel->save();
            $this->messageManager->addSuccessMessage(__("The staff information has been save."));
            return $this->_redirect("*/*/edit", ["id" => $staffModel->getId()]);
        }

        /* $this->_coreRegistry->register("staff", $model);
         $resultPage = $this->_resultPageFactory->create();
         $resultPage->setActiveMenu("QHO_Staff::staff");
         $resultPage->getConfig()->getTitle()->prepend(__($title));
         return $resultPage;*/
    }
}