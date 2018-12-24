<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 24/12/2018
 * Time: 23:54
 */

namespace QHO\Staff\Block\Adminhtml\Staff\Edit;
use Magento\Backend\Block\Widget\Form\Generic;
//use Magento\Backend\Block\Template\Context;
//use Magento\Framework\Registry;
//use Magento\Framework\Data\FormFactory;
//use QHO\Staff\Model\Config\Status;
//use Magento\Cms\Model\Wysiwyg\Config;
class Form extends Generic
{
    /*protected $_staffStatus;
    protected $_editor;
    public function __construct(
                        Context $context,
                        Registry $registry,
                        FormFactory $formFactory,
                        Status $status,
                        Config $editor,
                        array $data){
        $this->_staffStatus=$status;
        $this->_editor= $editor;
        parent::__construct($context,$registry,$formFactory,$data);
    }*/
    protected function _construct()
    {
        $this->setId("staff_form");
        $this->setTitle(__("Staff Information"));
        parent::_construct();
    }
    protected function _prepareForm()
    {
        //$model=$this->_coreRegistry->registry("staff");
        $form = $this->_formFactory->create(
            [
                "data" => [
                    "id" => "edit_form",
                    "action" => $this->getData("action"),
                    "method" => "post",
                    "enctype" => "multipart/form-data"
                ]
            ]
        );
        /* $fieldset=$form->addFieldset(
                "base_fieldset",
                ["legend"=>__("General Information"),"class"=>"fieldset-wide"]
            );
        if($model->getId()){
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
        $fieldset->addField(
                "avatar",
                "image",
                [
                    "name" => "avatar",
                    "label" => __("Avatar"),
                    "required" => true,
                ]
            );
        $editorConfig= $this->_editor->getConfig();
        $fieldset->addField(
            "profile",
            "editor",
            [
                "name" => "profile",
                "label" => __("Profile"),
                "config"=> $editorConfig,
                "style"=> "height:36em"
            ]
        );
        $data=$model->getData();
        $form->setValues($data); */
        $form->setHtmlIdPrefix("staff_main_");
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}