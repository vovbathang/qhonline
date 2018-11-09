<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:30
 */
namespace QHO\Schema\Controller\Index;

class Index4 extends \Magento\Framework\App\Action\Action{
    public function execute()
    {
        echo "<h2>Update Records</h2>";
        $model= $this->_objectManager->create("QHO\Schema\Model\DataExample");
        $data= $model->load(1);
        $data->setTitle("Tieu de 99")
            ->setContent("Noi dung 99")
            ->save();
        exit();
    }
}