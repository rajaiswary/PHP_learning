<?php
session_start();


if (!isset($_SESSION['name'])) 
{
  header("Location: register.php");
}

if (isset($_GET['logout'])) 
{

  session_destroy();
  header("Location: register.php");
}
?>
<html>
  <head>
    <title>Listing Page</title>
  </head>
  <body>
    <h1>User Information</h1>
    <p>Name: <?php echo $_SESSION['name']; ?></p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <p>Password: <?php echo $_SESSION['password']; ?></p>
    <p>Mobile: <?php echo $_SESSION['mobile']; ?></p>
    <a href="list.php?logout=true">Logout</a>
  </body>
</html>
