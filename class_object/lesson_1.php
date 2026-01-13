<?php

// the running pot is
// http://localhost/php-advance-courses/class_object/lesson_1.php

class Car {
    public $color = 'red';
    public $brandd =[
        'brand' => 'Toyota',
        'model' => 'Corolla',
        'class' => 'Sedan',
        'color' => 'blue',
        'music_system' =>'JBL',
        'wheels' => 'Alloy'
    ];
    public $isAvailable= false;

        public function testFunction($data){
            foreach($data as $key => $value){
                echo $key . " : " . $value . "\n";
            }
        }
   
    
    }

    // instantiate and use the class outside of its definition
    $obj = new Car();
    // echo $obj->color;
    $obj->testFunction([
        'brand' => 'Toyota',
        'model' => 'Corolla',
        'class' => 'Sedan',
        'color' => 'blue',
        'music_system' =>'JBL',
        'wheels' => 'Alloy'
    ]);


    ?>
