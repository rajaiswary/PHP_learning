<?php

$domain = array("google.com","amazon.com","flipkart.com","myntra.com","cashkaro.com");

echo count($domain);



if(count($domain) == 5)
{
    $current_base = "array.com";
    array_push($domain,$current_base);
    print_r($domain);
}

if(count($domain) == 4)
{
    
}



?>