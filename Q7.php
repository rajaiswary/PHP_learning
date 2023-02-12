<!DOCTYPE html>
<html lang="en">

<div style = "display : flex ; flex-direction: column;  text-Align : center ; ">
<form  method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">

<label>Name</label>
<input type = "text" name = "name">

<label>Email</label>
<input type = "email" name = "email">

<label>Password</label>
<input type = "password" name = "password">

<label>Mobile</label>
<input type = "number" name = "mob">

<input type = "submit">


</form>
</div>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = htmlspecialchars($_REQUEST['name']);
    $email = htmlspecialchars($_REQUEST['email']);
    $password = htmlspecialchars($_REQUEST['password']);
    $mob = htmlspecialchars($_REQUEST['mob']);


    echo $name,"<br>";
    echo $email,"<br>";
    echo $password,"<br>";
    echo $mob,"<br>";

}

?>


<body>
    
</body>
</html>