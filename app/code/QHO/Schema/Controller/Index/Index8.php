<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:55
 */
namespace QHO\Schema\Controller\Index;
use Magento\Framework\App\Action\Context;
class Index8 extends \Magento\Framework\App\Action\Action{
    /**
     * @var
     */
    protected $_dataExampleFactory;

    /**
     * Index8 constructor.
     * @param Context $context
     * @param \QHO\Schema\Model\DataExampleFactory $dataExampleFactory
     */
    public function __construct(Context $context, \QHO\Schema\Model\DataExampleFactory $dataExampleFactory)
    {
        $this->_dataExampleFactory=$dataExampleFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        echo "<h2>Show some Records</h2>";
        $model= $this->_dataExampleFactory->create();
        $data= $model->getCollection()->addFieldToSelect(['id', 'title', 'status'])
            ->addFieldtoFilter("status", ["eq"=>1])
            ->addFieldToFilter('id', ["gt"=>5]);
        echo "<pre>";
        print_r($data->getData());
        echo "</pre>";
    }
}

//eq =
//gt >
//lt <
//neq !=
//gteq >=
//lteq <=