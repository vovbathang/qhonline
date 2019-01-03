<?php
/**
 * Created by PhpStorm.
 * User: thangnguyen
 * Date: 13/11/2018
 * Time: 15:40
 */
namespace QHO\Hello\Controller\Index;
use Magento\Framework\View\App\Action\Action;
class Person
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

class Teacher
{
    public $person;

    public function setPerson($name, $age)
    {
        $this->person = new Person($name, $age);
    }

    public function getPerson()
    {
        return $this->person;
    }
}

$teacher = new Teacher;
$teacher->setPerson("Thang", 30);
echo $teacher->getPerson()->getName();
echo $teacher->getPerson()->getAge();
