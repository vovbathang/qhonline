<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 13/11/2018
 * Time: 15:40
 */

namespace QHO\Hello\Controller\Index;

<<<<<<< HEAD
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Test extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * Test constructor.
     * @param Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     */
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        return $this->_pageFactory->create();
    }
}
=======
use Magento\Framework\View\App\Action\Action;

class Person
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
}

class Teacher
{
    /**
     * @var
     */
    public $person;

    /**
     * @param $name
     * @param $age
     */
    public function setPerson($name, $age)
    {
        $this->person = new Person($name, $age);
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }
}

$teacher = new Teacher;
$teacher->setPerson("Thang", 30);
echo $teacher->getPerson()->getName();
echo $teacher->getPerson()->getAge();
>>>>>>> e86c4ca4f47958e8cf994e64f2d4761b62aae0b5
