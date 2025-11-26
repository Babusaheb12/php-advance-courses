<?php

// this is a url 
// http://localhost/php-advance-courses/class_object/lesson_2thisKeybord/this.php

class car {
    public $car ='octavia';

    // function
    public function favcar($name){
        $this ->car = $name;
        echo 'my facvorite car is'. $this->car;
    } 
}

$obj = new car;
    echo $obj -> car;
$obj -> favcar('BMW');

    ?>

