<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 22/11/2018
 * Time: 16:04
 */

namespace QHO\Staff\Controller\Adminhtml\Index;
class Delete extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam("id");
        if ($id) {
            try{
                $model = $this->_objectManager->create("QHO\Staff\Model\Staff");
                $model->load($id);
                if ($model->getId()) {
                    $imageHelper = $this->_objectManager->get("QHO\Staff\Helper\Image");
                    $imageHelper->removeImage($model->getAvatar());
                    $model->delete();
                    $this->messageManager->addSuccessMessage(__("This staff has been deleted."));
                    return $this->_redirect("*/*/");
                } else {
                    $this->messageManager->addErrorMessage(__("This staff no longer exists. "));
                    return $this->_redirect("*/*/");
                }
            }catch(\Exception $e){
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $this->_redirect("*/*/");
            }

        } else {
            $this->messageManager->addErrorMessage(__("We can not find any id to delete. "));
            return $this->_redirect("*/*/");
        }
    }
}