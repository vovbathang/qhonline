<?php
namespace QHO\Staff\Block\Adminhtml\Staff;
use Magento\Backend\Block\Widget\Form\Container;
class Edit extends Container{
	protected function _construct(){
		$this->_blockGroup="QHO_Staff";
		$this->_controller="adminhtml_staff";
		$this->objectId="id";
		parent::_construct();
	}
}