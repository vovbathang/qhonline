<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 28/11/2018
 * Time: 16:17
 */
namespace QHO\Staff\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class SaveData implements ObserverInterface {
    /**
     * @var
     */
    protected $_logger;

    /**
     * SaveData constructor.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger=$logger;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $model=$observer->getModel();
        $this->_logger->info("Staff Edited: ".$model->getName());
    }
}