<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/10/2018
 * Time: 17:46
 */
namespace Smart\Hello\Controller\Test;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        echo "Test Smart module";
        exit();
    }
}