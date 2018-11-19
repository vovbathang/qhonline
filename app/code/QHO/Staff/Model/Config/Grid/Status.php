<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 19/11/2018
 * Time: 17:42
 */

namespace QHO\Staff\Model\Config\Grid;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        $option = [
            [
                "label" => __("Enable"),
                "value" => 1
            ],
            [
                "label" => __("Disable"),
                "value" => 0
            ]
        ];
        return $option;
    }
}