<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/11/2018
 * Time: 10:49
 */

namespace QHO\Staff\Block\Adminhtml\Staff\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    public function _construct()
    {
        parent::_construct(); // TODO: Change the autogenerated stub
        $this->setId("staff_edit_tabs");
        $this->setDestElementId("edit_form");
        $this->setTitle(__("Staff Manager"));
    }
    protected function _beforeToHtml()
    {
        $this->addTab(
          "staff_main",
          [
              "label"=> __("Main Information"),
              "title"=> __("Main Information"),
              "content" => $this->getLayout()->createBlock(
                  "QHO\Staff\Block\Adminhtml\Staff\Edit\Tab\Main"
              )->toHtml(),
              "active"=>true
          ]
        );
        $this->addTab(
          "staff_avatar",
          [
              "label"=> __("Upload Avatar"),
              "title"=> __("Upload Avatar"),
              "content" => $this->getLayout()->createBlock(
                  "QHO\Staff\Block\Adminhtml\Staff\Edit\Tab\Avatar"
              )->toHtml(),
              "active"=>false
          ]
        );
        $this->addTab(
            "staff_profile",
            [
                "label"=> __("Staff Profile"),
                "title"=> __("Staff Profile"),
                "content" => $this->getLayout()->createBlock(
                    "QHO\Staff\Block\Adminhtml\Staff\Edit\Tab\Profile"
                )->toHtml(),
                "active"=>false
            ]
        );
        return parent::_beforeToHtml(); // TODO: Change the autogenerated stub
    }
}