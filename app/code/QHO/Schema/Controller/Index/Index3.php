<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:25
 */
namespace QHO\Schema\Controller\Index;

class Index3 extends \Magento\Framework\App\Action\Action{
    public function execute()
    {
        echo "<h2>Insert Records</h2>";
        $model= $this->_objectManager->create("QHO\Schema\Model\DataExample");
        $data= $model->load(1)->getData();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}