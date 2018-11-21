<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 21/11/2018
 * Time: 18:21
 */

namespace QHO\Staff\Model\Config;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    const ENABLE = 1;
    const DISABLE = 0;

    public function toOptionArray()
    {
        return [
            self::ENABLE=>__("Enable"),
            self::DISABLE=>__("Disable")
        ];
        // TODO: Implement toOptionArray() method.
    }
}