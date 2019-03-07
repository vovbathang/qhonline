<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 09/11/2018
 * Time: 16:20
 */
namespace QHO\Schema\Controller\Index;

class Index2 extends \Magento\Framework\App\Action\Action{
    public function execute()
    {
        echo "<h2>Insert multi Records</h2>";
        for ($i=2; $i<10; $i++){
            $model= $this->_objectManager->create("QHO\Schema\Model\DataExample");
            $model->addData([
                "title"=> "Tieu de $i",
                "content"=> "Noi dung $i",
                "status"=> rand(0,1),
                "sort_order"=> $i+1
            ])->save();
        }
        exit();
    }
}