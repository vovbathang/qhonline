<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/11/2018
 * Time: 11:33
 */

namespace QHO\Staff\Block\Adminhtml\Staff\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Profile extends Generic implements TabInterface
{
    /**
     * @var Config
     */
    protected $_editor;

    /**
     * Profile constructor.
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $editor
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $editor,
        array $data = [])
    {
        $this->_editor = $editor;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return Generic
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry("staff");
        $form = $this->_formFactory->create();

        $fieldset = $form->addFieldset(
            "profile_fieldset",
            ["legend" => __("Staff Profile"), "class" => "fieldset-wide"]
        );


        $editorConfig = $this->_editor->getConfig();
        $fieldset->addField(
            "profile",
            "editor",
            [
                "name" => "profile",
                "label" => __("Profile"),
                "config" => $editorConfig,
                "style" => "height:36em"
            ]
        );
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        return __("Staff Profile");
        // TODO: Implement getTabLabel() method.
    }

    public function getTabTitle()
    {
        return __("Staff Profile");
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