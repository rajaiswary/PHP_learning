<html>
<head>
  <style>
    .error{color : red;}
  </style>
  <title>Registration Form</title>
</head>
<body>
  <?php
  $name_error = "";
  $email_error = "";
 
  $mobile_error = "";
  $password_error = "";


  $name = $email= "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $is_valid = true;

    if (!preg_match("/^[a-zA-Z]+$/", $name)) {
      $name_error = "Name must contain only letters";
      $is_valid = false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format";
      $is_valid = false;
    }

   

    if (!preg_match("/^[7-9][0-9]{9}$/", $mobile)) {
      $mobile_error = "Mobile must start with 7, 8 or 9 and contain 10 digits";
      $is_valid = false;
    }

    if (!preg_match("/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+=-])(?=.*[0-9]).{8,}$/", $password)) {
      $password_error = "Password must contain at least one upper-case letter, one special character and a minimum of 8 characters";
      $is_valid = false;
    }

    if ($is_valid) {
      header("Location: success.php?name=$name&email=$email&mobile=$mobile");

      exit();
    }
  }
  ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"  value="<?php echo $name;?>" required>
    <span class="error"><?php echo $name_error; ?></span><br><br>


    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value = "<?php echo $email;?>" required>
    <span class="error"><?php echo $email_error; ?></span><br><br>

    

    <label for="mobile">Mobile:</label>
    <input type="number" id="mobile" name="mobile" value = "<?php echo $mobile;?>" required>
    <span class="error"><?php echo $mobile_error; ?></span><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <span class="error"><?php echo $password_error; ?></span><br><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>

