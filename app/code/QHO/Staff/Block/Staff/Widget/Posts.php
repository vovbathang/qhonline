<?php

namespace QHO\Staff\Block\Staff\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use QHO\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Framework\ObjectManagerInterface;

class Posts extends Template implements BlockInterface
{
    protected $_staffFactory;
    protected $_objectManager;
    protected $_template = "widget/posts.phtml";

    public function __construct(
        Template\Context $context,
        CollectionFactory $staffFactory,
        ObjectManagerInterface $objectManager,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_staffFactory = $staffFactory;
        $this->_objectManager = $objectManager;
    }

    protected function _beforeToHtml()
    {
        $ids = explode(",", $this->getData("recordshow"));
        $model = $this->_staffFactory->create();
        $staffs = $model->addFieldToFilter("status", ["eq" => true])
            ->addFieldToFilter("id", ["in" => $ids])
            ->getData();
        $this->setData("staffs", $staffs);
        return parent::_beforeToHtml();
    }

    public function getBaseURLMedia()
    {
        $media = $this->_objectManager->get("Magento\Store\Model\StoreManagerInterface")
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media;
    }
}