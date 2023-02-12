<?php
$domain_names = array("Google.com", "Experion.com", "Amazon.com", "Microsoft.com");

if (count($domain_names) == 5) 
{
    $current_base_url = $_SERVER['HTTP_HOST'];
    array_push($domain_names, $current_base_url);
} 
elseif (count($domain_names) == 4) 
{
    $current_base_url = $_SERVER['HTTP_HOST'];
    $modified_base_url = str_replace($current_base_url, $current_base_url."/exercise", $current_base_url);
    array_push($domain_names, $modified_base_url);
}

print_r($domain_names);
?>
