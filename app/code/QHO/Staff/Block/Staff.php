<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/11/2018
 * Time: 14:44
 */

namespace QHO\Staff\Block;

use Magento\Framework\View\Element\Template;
use QHO\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Framework\ObjectManagerInterface;

class Staff extends Template
{
    /**
     * @var CollectionFactory
     */
    protected $_staffFactory;
    /**
     * @var ObjectManagerInterface
     */
    protected $_objectManager;
    /**
     * @var string
     */
    protected $_template = "widget/posts.phtml";

    /**
     * Staff constructor.
     * @param Template\Context $context
     * @param CollectionFactory $staffFactory
     * @param ObjectManagerInterface $objectManager
     * @param array $data
     */
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

    /**
     * @return mixed
     */
    public function getBaseURLMedia()
    {
        $media = $this->_objectManager->get("Magento\Store\Model\StoreManagerInterface")
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media;
    }

    /**
     * @return Template
     */
    protected function _beforeToHtml()
    {
        $model = $this->_staffFactory->create();
        $staffs = $model->addFieldToFilter("status", ["eq" => true])->getData();
        $this->setData("staffs", $staffs);
        return parent::_beforeToHtml();
    }
}