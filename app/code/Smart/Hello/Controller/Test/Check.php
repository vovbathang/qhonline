<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 30/10/2018
 * Time: 18:30
 */
namespace Smart\Hello\Controller\Test;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;

class Check extends \Smart\Hello\Controller\Test\Save{
    /**
     * Check constructor.
     * @param Context $context
     * @param RequestInterface $request
     */
    public function __construct(Context $context, RequestInterface $request)
    {
        parent::__construct($context, $request);
    }

    public function execute()
    {
        parent::execute(); // TODO: Change the autogenerated stub
        echo "Check";
        exit();
    }
}