<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 29/10/2018
 * Time: 16:16
 */
namespace QHO\Hello\Controller\Index;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action{
    /**
     * @var RequestInterface
     */
    protected $_request;

    /**
     * Index constructor.
     * @param Context $context
     * @param RequestInterface $request
     */
    public function __construct(Context $context, RequestInterface $request)
    {
        $this->_request=$request;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $fullRequest=$this->getInfo();
        $module=$fullRequest[0];
        $controller=$fullRequest[1];
        $action=$fullRequest[2];
        echo "<h1>$module Module - $controller Controller - $action Action</h1>";
        exit();
    }

    /**
     * Define getInfo function
     */
    public function getInfo()
    {
        $requestName= $this->_request->getFullActionName();
        $result= explode("_", $requestName);
        return $result;
    }
}