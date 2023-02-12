<?php


// define("fruits",[
//     "Orange",

//  "Mango",

// "Apple",

// "Banana",

// "Pineapple"
// ]);


$fruits = array("Orange","Mango","Apple","Banana","Pineapple");

$length = count($fruits);

sort($fruits);

foreach($fruits as $value)
{
    echo "$value <br>";
}






?>



