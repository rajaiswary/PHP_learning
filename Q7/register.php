<?php
session_start();

if (isset($_POST['submit'])) {
  
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  $_SESSION['mobile'] = $_POST['mobile'];

  
  header("Location: list.php");
}
?>
<html>
  <head>
    <title>Registration Page</title>
  </head>
  <body>
    <h1>Registration Form</h1>
    <form action="" method="post">
      <label>Name:</label>
      <input type="text" name="name" required><br><br>
      <label>Email:</label>
      <input type="email" name="email" required><br><br>
      <label>Password:</label>
      <input type="password" name="password" required><br><br>
      <label>Mobile:</label>
      <input type="text" name="mobile" required><br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
</html>
