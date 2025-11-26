
<?php
/// tghis is a url
// http://localhost/php-advance-courses/inheritance/Multilevel_inheritance.php


class A {
	public function grandParent(){
		return "Grand father's age is 80.";
	}
}

class B extends A {
	public function father(){
		return "Father's age is 50.";
	}	
}

class C extends B {
	public function you(){
		return "Your age is 20.";
	}

	public function getHistory(){
		echo "Class A : " . $this->grandParent();
		echo "<hr> Class B : " . $this->father();
		echo "<hr> Class C : " . $this->you();
	}
}

$obj = new C;
$obj->getHistory();

?>