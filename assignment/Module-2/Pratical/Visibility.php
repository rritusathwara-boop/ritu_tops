==========public=========

<?php
class Student 
{
    public $name = "Ritu";

    public function display() 
	{
        echo $this->name;
    }
}

$obj = new Student();
echo $obj->name;   // Accessible
$obj->display();
?>

==========Private==========

<?php
class Student 
{
    private $name = "Ritu";

    private function display() 
	{
        echo $this->name;
    }

    public function show() 
	{
        $this->display();
    }
}

$obj = new Student();
$obj->show();
?>


=========protected ==========


<?php
class Student 
{
    protected $name = "Ritu";
}

class Test extends Student 
{
    public function display() 
	{
        echo $this->name;
    }
}

$obj = new Test();
$obj->display();
?>