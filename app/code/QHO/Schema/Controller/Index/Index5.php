<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:34
 */
namespace QHO\Schema\Controller\Index;

class Index5 extends \Magento\Framework\App\Action\Action{
    public function execute()
    {
        echo "<h2>Delete Records</h2>";
        $model= $this->_objectManager->create("QHO\Schema\Model\DataExample");
        $data= $model->load(7);
        $data->delete();
        exit();
    }
}