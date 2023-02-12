<?php






session_start();

if (isset($_POST['submit']))
{

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];


    header("Location:list.php");

}



?>


<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <h1>Login User</h1>
    <form action="" method="post">
      
      <label>Email:</label>
      <input type="email" name="email" required><br><br>
      <label>Password:</label>
      <input type="password" name="password" required><br><br>
      <input type="submit" name = "submit" value="Submit">

      <a href = "register.php">NewUser</a>

      
    </form>
  </body>
</html>