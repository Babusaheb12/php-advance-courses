<?php

// this is a url

// http://localhost/php-advance-courses/inheritance/hierarchical_inheritance.php


class A {
	public function categoryName(){
		return "Category is Sedan.";
	}
}

class B extends A {
	public function yourName(){
		return "My fav car is A4.";
	}	

	public function getHistory(){
		echo "Class A : " . $this->categoryName();
		echo "<hr> Class B : " . $this->yourName();
	}
}

class C extends A {
	public function siblingName(){
		return "Sibling's fav car is RS 5.";
	}

	public function getHistory(){
		echo "Class A : " . $this->categoryName();
		echo "<hr> Class C : " . $this->siblingName();
	}
}

class D extends C {
	public function siblingName(){
		return "Sibling's fav car is RS 7.";
	}

	public function getHistory(){
		echo "Class A : " . $this->categoryName();
		echo "<hr> Class C : " . $this->siblingName();
	}
}


$obj_1 = new B;
$obj_1->getHistory();
$obj_1 = new D;
$obj_1->getHistory();

?>