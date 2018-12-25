<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 22/11/2018
 * Time: 16:34
 */

namespace QHO\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;
use QHO\Staff\Model\ResourceModel\Staff\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $_filter;
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * MassDelete constructor.
     * @param Action\Context $context
     * @param Filter $filter
     * @param CollectionFactory $collection
     */
    public function __construct(Action\Context $context,
                                Filter $filter,
                                CollectionFactory $collection)
    {
        parent::__construct($context);
        $this->_filter = $filter;
        $this->_collectionFactory = $collection;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        $collectionObject= $this->_collectionFactory->create();
        $collection = $this->_filter->getCollection($collectionObject);
        $imageHelper = $this->_objectManager->get("QHO\Staff\Helper\Image");
        $numberRecord= $collection->getSize();
        foreach ($collection as $item){
            $imageHelper->removeImage($item->getAvatar());
            $item->delete();
        }
        $this->messageManager->addSuccessMessage(__("Total of %1 records have been deleted.", $numberRecord));
        return $this->_redirect("*/*/");
    }
}