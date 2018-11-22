<?php
namespace QHO\Staff\Controller\Adminhtml\Index;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use QHO\Staff\Model\StaffFactory;
use Magento\Framework\Registry;
class Edit extends \Magento\Backend\App\Action{
	protected $_resultPageFactory;
	protected $_staffFactory;
	protected $_coreRegistry;
	public function __construct(
					Context $context, 
					PageFactory $pageFactory,
					StaffFactory $staffFactory,
					Registry $registry){
		parent::__construct($context);
		$this->_resultPageFactory=$pageFactory;
		$this->_staffFactory=$staffFactory;
		$this->_coreRegistry = $registry;
	}
	public function execute(){
		$staffId=$this->getRequest()->getParam("id");
		$model=$this->_staffFactory->create();
		if($staffId){
			$model->load($staffId);
			if(!$model->getId()){
				$this->messageManager->addError(__("This staff no longer exists"));
				return $this->_redirect("*/*/");
			}
			$title="Edit A Staff: ".$model->getName();
		}else{
			$title="Add A New Staff";
		}
		$data=$this->_session->getFormData(true);
		if(!empty($data)){
			$model->setData($data);
		}
		$this->_coreRegistry->register("staff",$model);
		$resultPage=$this->_resultPageFactory->create();
		$resultPage->setActiveMenu("QHO_Staff::staff");
		$resultPage->getConfig()->getTitle()->prepend(__($title));


		return $resultPage;
	}
}