<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 23/11/2018
 * Time: 15:05
 */

namespace QHO\Staff\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;
use QHO\Staff\Model\ResourceModel\Staff\CollectionFactory;

class MassDisable extends \Magento\Backend\App\Action
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
        $collectionObject = $this->_collectionFactory->create();
        $collection = $this->_filter->getCollection($collectionObject);
        $numberRecord = $collection->getSize();
        foreach ($collection as $item) {
            $item->setStatus(0);
            $item->save();
        }
        $this->messageManager->addSuccessMessage(__("Total of %1 records have been disabled.", $numberRecord));
        return $this->_redirect("*/*/");
    }
}