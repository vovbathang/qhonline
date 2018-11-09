<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:42
 */
namespace QHO\Schema\Controller\Index;

class Index7 extends \Magento\Framework\App\Action\Action{
    public function execute()
    {
        echo "<h2>Show some Records</h2>";
        $model= $this->_objectManager->create("QHO\Schema\Model\DataExample");
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