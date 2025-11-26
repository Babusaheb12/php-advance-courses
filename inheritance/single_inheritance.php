
<?php

// this is a url
// http://localhost/php-advance-courses/inheritance/single_inheritance.php


class ParentClass{
	public $car = 'My fav car is Audi';
	
	function returnValue(){
		echo $this->car;
	}

	function setCarName($brand){
		echo $this->car = $brand;
	}

}

class ChildClass extends ParentClass{
	
	function setNewCar($brand){
		echo $this->car = $brand;
	}
}

$obj = new ChildClass;
echo $obj->car;
$obj->setNewCar('<hr> My fav car is Hyundai <hr>');
//$obj->returnValue();
$obj->setCarName('<hr> My fav car is Skoda');


?>