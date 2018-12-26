<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:05
 */
namespace QHO\Schema\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action{
    public function execute()
    {
        echo "<h2>Insert Records</h2>";
        $model= $this->_objectManager->create("QHO\Schema\Model\DataExample");
        $model->addData([
            "title"=> "Tieu de 01",
            "content"=> "Noi dung 01",
            "status"=> true,
            "sort_order"=> 1
        ])->save();
        // TODO: Implement execute() method.
    }
}