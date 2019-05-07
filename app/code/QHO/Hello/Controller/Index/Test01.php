<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 28/12/2018
 * Time: 00:54
 */

namespace QHO\Hello\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use QHO\Staff\Model\StaffFactory;
use Magento\Framework\Registry;

class Test01 extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;
    /**
     * @var StaffFactory
     */
    protected $_staffFactory;
    /**
     * @var Registry
     */
    protected $_coreRegistry;
    /**
     * Const
     */
    const ADMIN_RESOURCE = "QHO_Staff::staff_save";

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param StaffFactory $staffFactory
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        StaffFactory $staffFactory,
        Registry $registry)
    {
        parent::__construct($context);
        $this->_resultPageFactory = $pageFactory;
        $this->_staffFactory = $staffFactory;
        $this->_coreRegistry = $registry;
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        $staffId = $this->getRequest()->getParam("id");
        $model = $this->_staffFactory->create();
        if ($staffId) {
            $model->load($staffId);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__("This staff no longer eixts."));
                return $this->_redirect("*/*/");
            }
            $title = "Edit A Staff: " . $model->getName();
        } else {
            $title = "Add A New Staff";
        }
    }
}

interface dongvat
{
    function am_thanh();

    function chan();
}

interface khac
{
    function loi_ich();
}

class khaibao
{
    public $name;

    public function set_name($ten)
    {
        return $this->name = $ten;
    }

    public function get_name()
    {
        return $this->name;
    }
}

class dog extends khaibao implements dongvat, khac
{
    public function am_thanh()
    {
        // TODO: Implement am_thanh() method.
        echo "gaugau";
    }

    public function chan()
    {
        // TODO: Implement chan() method.
        echo "4 chan";
    }

    public function loi_ich()
    {
        // TODO: Implement loi_ich() method.
        echo "giu nha";
    }
}

class mouse extends khaibao implements dongvat
{
    public function am_thanh()
    {
        // TODO: Implement am_thanh() method.
        echo "chit chit";
    }

    public function chan()
    {
        // TODO: Implement chan() method.
        echo "4chan";
    }
}


// doi tuong a the hien lai lop dog
$a = new dog;
$a->set_name("lulu");
echo $a->get_name();
$a->am_thanh();
$a->chan();
$a->loi_ich();
echo "<hr />";
//doi tuong b the hien lai lop mouse
$b = new mouse;
$b->set_name("micky");
echo $b->get_name();
$b->am_thanh();
$b->chan();
