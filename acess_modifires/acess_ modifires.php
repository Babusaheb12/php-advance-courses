
<?php

// this is a url
// http://localhost/php-advance-courses/acess_modifires/acess_%20modifires.php


class myClass{

	// Constructor must be public.
	function __construct(){
		echo 'This is constructor. <hr>';
	}

	public function publicFunction(){
		echo 'This is public function. <hr>';	
	}

	protected function protectedFunction(){
		echo 'This is protected function. <hr>';	
	}
	
	private function privateFunction(){
		echo 'This is private function. <hr>';	
	}

	public function baseFunction(){
		$this->publicFunction();
		$this->protectedFunction();
		$this->privateFunction();
	}

}

class anotherClass extends myClass{

	public function callingFunction(){
		$this->publicFunction();
		$this->protectedFunction();
		$this->privateFunction();
	}
}


$obj = new anotherClass;
$obj->baseFunction();
$obj->callingFunction();
$obj->publicFunction();
$obj->protectedFunction();
$obj->privateFunction();







/*
1. public:- it can be accessed from anywhere.
2. private:- it can acess in with in the class only.
3. protected:- it can acess in with in the class and child class only.
*/


?>





