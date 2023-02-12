<?php

$username = "user";

setcookie('username',$username);


echo $username;






if(!isset($_COOKIE['username']))
{
    echo "Login Unsuccesfull";
}
else
{
    echo "Login Succesfull";

}

?>

  