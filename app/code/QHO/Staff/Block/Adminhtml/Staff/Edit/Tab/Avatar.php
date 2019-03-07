<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/11/2018
 * Time: 11:33
 */

namespace QHO\Staff\Block\Adminhtml\Staff\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Avatar extends Generic implements TabInterface
{
    /**
     * @return Generic
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry("staff");
        $form = $this->_formFactory->create();

        $fieldset = $form->addFieldset(
            "avatar_fieldset",
            ["legend" => __("Upload Avatar"), "class" => "fieldset-wide"]
        );

        $fieldset->addField(
            "avatar",
            "image",
            [
                "name" => "avatar",
                "label" => __("Avatar"),
                "required" => true,
            ]
        );
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        return __("Upload Avatar");
        // TODO: Implement getTabLabel() method.
    }

    public function getTabTitle()
    {
        return __("Upload Avatar");
        // TODO: Implement getTabTitle() method.
    }

    public function canShowTab()
    {
        return true;
        // TODO: Implement canShowTab() method.
    }

    public function isHidden()
    {
        return false;
        // TODO: Implement isHidden() method.
    }
}