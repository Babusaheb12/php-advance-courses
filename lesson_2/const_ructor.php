
<?php

// this is a url
// http://localhost/php-advance-courses/lesson_2/const_ructor.php


class Myclass{

    function __construct(){
        echo"this is constrctor function";
    }

    function show(){
        echo"this is functionnshow";
    }

    function __destruct(){
        echo"this is a discructor";
    }

}
$obj = new MyClass();