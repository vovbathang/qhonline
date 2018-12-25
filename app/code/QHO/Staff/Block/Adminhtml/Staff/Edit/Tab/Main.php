<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/11/2018
 * Time: 10:59
 */

namespace QHO\Staff\Block\Adminhtml\Staff\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use QHO\Staff\Model\Config\Status;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    /**
     * @var Status
     */
    protected $_staffStatus;

    /**
     * Main constructor.
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Status $status,
        array $data = [])
    {
        $this->_staffStatus = $status;
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
            "base_fieldset",
            ["legend" => __("General Information"), "class" => "fieldset-wide"]
        );
        if ($model->getId()) {
            $fieldset->addField(
                "id",
                "hidden",
                ["name" => "id"]
            );
        }
        $fieldset->addField(
            "name",
            "text",
            [
                "name" => "name",
                "label" => __("Full Name"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "email",
            "text",
            [
                "name" => "email",
                "label" => __("Email"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "phone",
            "text",
            [
                "name" => "phone",
                "label" => __("Phone"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "position",
            "text",
            [
                "name" => "position",
                "label" => __("Position"),
                "required" => true,
            ]
        );
        $fieldset->addField(
            "status",
            "select",
            [
                "name" => "status",
                "label" => __("Status"),
                "required" => true,
                "options" => $this->_staffStatus->toOptionArray()
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        return __("Main Information");
        // TODO: Implement getTabLabel() method.
    }

    public function getTabTitle()
    {
        return __("Main Information");
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