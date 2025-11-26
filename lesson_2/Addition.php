
<?php

// this is a url
// http://localhost/php-advance-courses/lesson_2/Addition.php

class Calculator {
    public $a;
    public $b;
// constructor :automatically called when an object is created
    public function __construct($x,$y){
        $this->a = $x;
        $this->b =$y;

        echo "this is constructor recived -a = $x and b= $y<br>";
    }

    public function add(){
        $sum =$thia->a + $this->b;
        echo "the sum of a and b is : $sum<br>";
    }

    // destructor : automatically called when the object is destroyed
    public function __destruct(){
        echo "this is destructor";
    }

}
$obj = new Calculator(20,30);
$obj->add();