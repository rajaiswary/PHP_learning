<html>
<head>
<title>PHP Registration Form with Validations</title>
</head>
<body>

<form action="" method="post">

<p>
<label for="first_name">First Name:</label>
<input type="text" id="first_name" name="first_name" required pattern="[a-zA-Z]+">
</p>


<p>
<label for="last_name">Last Name:</label>
<input type="text" id="last_name" name="last_name" required pattern="[a-zA-Z]+">
</p>


<p>
<label for="email">Email:</label>
<input type="email" id="email" name="email" required>
</p>


<p>
<label for="mobile">Mobile:</label>
<input type="text" id="mobile" name="mobile" required pattern="[7-9]{1}[0-9]{9}">
</p>


<p>
<label for="password">Password:</label>
<input type="password" id="password" name="password" required pattern="(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}">
</p>

<p>
<input type="submit" value="Submit">
</p>

</form>

</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  
  if (!preg_match("/^[a-zA-Z]+$/", $first_name)) {
    echo "First name can only contain letters.";
  } elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
    echo "Last name can only contain letters.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
  } elseif (!preg_match("/^[7-9]{1}[0-9]{9}$/", $mobile)) {
    echo "Invalid mobile number.";
  } elseif (!preg_match("/(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}/", $password)) {
    echo "Password must contain one special character, one upper-case letter, and minimum of eight characters.";
  } else {

    header("Location: success.php?first_name=$first_name&last_name=$last_name&email=$email&mobile=$mobile");

  exit;
 }
}

